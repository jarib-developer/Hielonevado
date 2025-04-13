<?php

namespace App\Controllers\Landlords;

class Landlords extends LandlordsBaseController
{
  public function List()
  {
    $Data = array('UserData' => session()->get('UserData'));
    return view('Landlords/List/ViewPage', $Data);
  }

  public function Add()
  {
    // Get Identification Types

    $Data = array(
      'UserData' => session()->get('UserData'),
      'IdentificationTypes' => $this->GetIdentificationTypesForPersons(),
      'DocType' => session()->get('UserData'),
    );
    return view('Landlords/Add/ViewPage',$Data);
  }

  public function AddAction()
  {
    // $this->SaveRecord(Data, Photo)
    $query = $this->SaveRecord($this->request->getPost(),$this->request->getFile('foto'));
    session()->setFlashdata('mensaje', 'Todo salió bien');
    // Redirection 
    return redirect()->to('/Landlords')->with('action',$query);
  }

  public function View()
  {
    $this->GetLandLordForView($this->request->getPost('ItemID'));
    

    echo ('View - Landlord');
  }

  public function Edit()
  {
    print_r($this->request->getPost());
    echo ('Edit - Landlord');
  }
}
