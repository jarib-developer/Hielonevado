<?php
if (!function_exists('OrderDataForDashboard')) {
  function OrderDataForDashboard($MainData)
  {

    $userData = array(
      'id' => $MainData['id'],
      'nickname' => $MainData['nickname'],
      'sckey' => $MainData['sckey'],
      'lastlog' => $MainData['lastlog'],
      'created_at' => $MainData['created_at'],
    );

    $profileData = array(
      'id' => $MainData['profile_id'],
      'description' => $MainData['profile_description'],
      'state' => $MainData['profile_state'],
      'nickname' => $MainData['nickname'],
    );

    $personData = [
      'id' => $MainData['person_id'],
      'name' => $MainData['person_name'],
      'surname' => $MainData['person_surname'],
      'lastname' => $MainData['person_lastname'],
      'surlastname' => $MainData['person_surlastname'],
      'mail' => $MainData['person_mail'],
      'phone' => $MainData['person_phone'],
      'identification' => $MainData['person_identification'],
      'identification_type' => $MainData['person_idpersonsIdentificationType'],
      'created_at' => $MainData['person_created_at'],
      'updated_at' => $MainData['person_updated_at'],
    ];

    $identificationTypeData = [
      'id' => $MainData['IdentificationType_id'],
      'name' => $MainData['IdentificationType_name'],
      'description' => $MainData['IdentificationType_description'],
      'abb' => $MainData['IdentificationType_abb'],
      'state' => $MainData['IdentificationType_state'],
      'created_at' => $MainData['IdentificationType_created_at'],
      'updated_at' => $MainData['IdentificationType_updated_at'],
    ];

    $UserData = array(
      'user' => $userData,
      'profile' => $profileData,
      'person' => $personData,
      'IdentificationType' => $identificationTypeData,
    );
    return $UserData;
  }
}
