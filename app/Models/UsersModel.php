<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nickname','password','state','sckey','lastlog','created_at','created_at'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    public function getUserforLogin($nickname)
    {
        return $this->select('users.password, users.id AS userID')
                    ->Where('users.nickname', $nickname)
                    ->first();
    }
    public function getUserDataByID($id)
    {
        return $this->select('users.*,
                     userprofiles.id As profile_id,
                     userprofiles.description As profile_description,
                     userprofiles.state As profile_state,
                     userprofiles.created_at As profile_created_at,
                     userprofiles.updated_at As profile_updated_at,

                     personsdata.id AS person_id, 
                     personsdata.name AS person_name, 
                     personsdata.surname AS person_surname, 
                     personsdata.lastname AS person_lastname, 
                     personsdata.surlastname AS person_surlastname, 
                     personsdata.mail AS person_mail, 
                     personsdata.phone AS person_phone, 
                     personsdata.identification AS person_identification, 
                     personsdata.idpersonsIdentificationType AS person_idpersonsIdentificationType, 
                     personsdata.created_at AS person_created_at, 
                     personsdata.updated_at AS person_updated_at, 

                     personsidentificationtype.id AS IdentificationType_id,
                     personsidentificationtype.name AS IdentificationType_name,
                     personsidentificationtype.description AS IdentificationType_description,
                     personsidentificationtype.abb AS IdentificationType_abb,
                     personsidentificationtype.state AS IdentificationType_state,
                     personsidentificationtype.created_at AS IdentificationType_created_at,
                     personsidentificationtype.updated_at AS IdentificationType_updated_at,
                     
                     ')
                    ->join('userprofiles', 'userprofiles.id = users.idUserProfiles')
                    ->join('personsdata', 'personsdata.id = users.idPersonsData')
                    ->join('personsidentificationtype', 'personsidentificationtype.id = personsdata.idpersonsIdentificationType')
                    ->Where('users.id', $id)
                    ->findAll();
    }
}
