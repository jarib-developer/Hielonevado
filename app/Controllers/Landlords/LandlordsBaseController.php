<?php

namespace App\Controllers\Landlords;

use App\Controllers\BaseController;
use App\Models\PersonsIdentificationTypeModel;
use App\Models\AvatarsModel;
use App\Models\PersonsdataModel;
use App\Models\TenantsModel;

class LandlordsBaseController extends BaseController
{
  public function GetLandLordForView($itemID)
  {
    if (!isset($itemID) || empty($itemID)) {
      // El campo no está presente o está vacío
      echo 'El campo ItemID está vacío o no existe.';
    } else {
      // El campo existe y tiene valor
      echo 'El campo ItemID tiene el valor: ' . $itemID;
    }
  }

  // Add LandLord Data Generation
  public function GetIdentificationTypesForPersons(){
    $PersonsIdentificationTypeModel = new PersonsIdentificationTypeModel();
    return $PersonsIdentificationTypeModel->findAll();
  }

  // Save Record
  public function SaveRecord($formData,$Photo){
    
    $Actions = array(
                        'Avatar'=>false,
    );
    // Has Image? Handle Image And ImageData
    if ($Photo->isValid() && !$Photo->hasMoved()) {
      # Do Upload & bring Inserted ID
      $Actions['Avatar'] = $this->UploadAvatarPhoto($Photo);
    }
    // Save Person
    # Clean Phone Format
    if ($formData['phone'] !== '') {
      $formData['phone'] = str_replace('-', '', $formData['phone']);
    }
    
    # Order Info
    if ($Actions['Avatar']['status']) {
      # Push Id to Data Array
      array_push($formData, $Actions['Avatar']['Data']);
    }
    $Actions['person'] = $this->SaveEntityPerson($formData);
    // Save Entity Tenenat
    if ($Actions['person']['status']) {
      $Actions['tenant'] = $this->SaveEntityTenant($Actions['person']['Data']);
    }else{
      $errorOnTenant = array(
        'status' => false,
        'msg' => 'Error al Crear Registro.',
        'Data' => "{ID} identificador no asignado.",
      );
      $Actions['tenant'] = $errorOnTenant;
    }
    echo('<pre>'.$Actions['person']['Data']);
    print_r($formData);
    print_r($Actions);
    exit();
    return $Actions;
  }

  private function UploadAvatarPhoto($PhotoFile){
    // Nombre único para evitar sobrescribir archivos
    $nombreAsignado = uniqid('avatar_');
    $extension = 'png'; // Convertimos todo a jpg por eficiencia
    $nombreArchivo = $nombreAsignado . '.' . $extension;
    $ruta = 'uploads/Images/Avatars/Landlords/';
    $rutaCompleta = ROOTPATH . 'public/' . $ruta . $nombreArchivo;
    helper('MakeRouteAndValidate_helper');
    MakeRouteAndValidate(ROOTPATH . 'public/' . $ruta);
    // Redimensionar y optimizar
    \Config\Services::image()
                              ->withFile($PhotoFile)
                              ->resize(200, 200, true, 'width')  // Redimensiona a máximo 800px de ancho
                              ->save($rutaCompleta, 75);         // Guarda con calidad 75%
    // Guardar info en BD
    # Build Data Array
    $avatarData = array(
                        'filename'    => $nombreAsignado,
                        'file_ext' => $extension,
                        'file_src'      => 'public/' . $ruta . $nombreArchivo 
                      );
    $action = $this->saveAvatarDataOnDB($avatarData);                
    if (!$action['status']) {
        if (file_exists($rutaCompleta)) {
          unlink($rutaCompleta);
      }
    }
    return $this->saveAvatarDataOnDB($avatarData);
  }

  private function saveAvatarDataOnDB($avatarData){
    print_r($avatarData);
    $Avatarsmodel = new Avatarsmodel();
    try {
      $query = $Avatarsmodel->insert($avatarData, true); // ← esto te devuelve el ID insertado
      $returnInfo = array(
                          'status' => true,
                          'msg' => 'Archivo correctamente.',
                          'Data' => $query,
                          );
      return $returnInfo;
    } 
    catch (\Throwable $e) {
      $returnInfo = array(
                          'status' => false,
                          'msg' => 'Error al subir archivo.',
                          'Data' => $e->getMessage(),
                        );
        return $returnInfo;
    }
  }


  private function SaveEntityPerson($personData){
    $PersonsdataModel = new PersonsdataModel();
    try {
      $query = $PersonsdataModel->insert($personData, true); // ← esto te devuelve el ID insertado
      $returnInfo = array(
                          'status' => true,
                          'msg' => 'Registro Ingresado correctamente.',
                          'Data' => $query,
                          );
      return $returnInfo;
    } 
    catch (\Throwable $e) {
      $returnInfo = array(
                          'status' => false,
                          'msg' => 'Error al Crear Registro.',
                          'Data' => $e->getMessage(),
                        );
        return $returnInfo;
    }
  }

  private function SaveEntityTenant($persondataID){
    $TenantsModel = new TenantsModel();
    try {
      $query = $TenantsModel->insert(['idPersonsData' => $persondataID], true); // ← esto te devuelve el ID insertado
      $returnInfo = array(
                          'status' => true,
                          'msg' => 'Registro Ingresado correctamente.',
                          'Data' => $query,
                          );
      return $returnInfo;
    } 
    catch (\Throwable $e) {
      $returnInfo = array(
                          'status' => false,
                          'msg' => 'Error al Crear Registro.',
                          'Data' => $e->getMessage(),
                        );
        return $returnInfo;
    }
  }

}
