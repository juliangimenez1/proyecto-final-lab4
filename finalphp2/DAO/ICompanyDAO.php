<?php

namespace DAO;

use Models\Company as Company;

interface ICompanyDAO
{
    function add(Company $company);
    function GetAll();
    function GetById($number);
    function GetByName($name);
    function Modify($number, $name, $email, $phone, $address, $cuit, $website, $founded);
    function Delete($number);
}
