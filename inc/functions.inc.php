<?php

/**
 * Récupérer l'ensemble des villes présentent dans les listes déroulantes du site
 */
function getCities($returnOptions = false, $currentCity = null)
{
    $cities = array();

    $cities['aarschot'] = "Aarschot";
    $cities['alost'] = "Alost";
    $cities['andenne'] = "Andenne";
    $cities['antoing'] = "Antoing";
    $cities['anvers'] = "Anvers";
    $cities['arlon'] = "Arlon";
    $cities['ath'] = "Ath";
    $cities['audenarde'] = "Audenarde";
    $cities['bastogne'] = "Bastogne";
    $cities['beaumont'] = "Beaumont";
    $cities['beauraing'] = "Beauraing";
    $cities['beringen'] = "Beringen";
    $cities['bilzen'] = "Bilzen";
    $cities['binche'] = "Binche";
    $cities['blankenberge'] = "Blankenberge";
    $cities['bouillon'] = "Bouillon";
    $cities['braine-le-comte'] = "Braine-le-Comte";
    $cities['bree'] = "Bree";
    $cities['bruges'] = "Bruges";
    $cities['bruxelles'] = "Bruxelles";
    $cities['charleroi'] = "Charleroi";
    $cities['chatelet'] = "Châtelet";
    $cities['chievres'] = "Chièvres";
    $cities['chimay'] = "Chimay";
    $cities['chiny'] = "Chiny";
    $cities['ciney'] = "Ciney";
    $cities['comines-warneton'] = "Comines-Warneton";
    $cities['courtrai'] = "Courtrai";
    $cities['couvin'] = "Couvin";
    $cities['damme'] = "Damme";
    $cities['deinze'] = "Deinze";
    $cities['diest'] = "Diest";
    $cities['dilsen-stokkem'] = "Dilsen-Stokkem";
    $cities['dinant'] = "Dinant";
    $cities['dixmude'] = "Dixmude";
    $cities['durbuy'] = "Durbuy";
    $cities['eeklo'] = "Eeklo";
    $cities['enghien'] = "Enghien";
    $cities['eupen'] = "Eupen";
    $cities['fleurus'] = "Fleurus";
    $cities['florenville'] = "Florenville";
    $cities['fontaine-leveque'] = "Fontaine-l'Évêque";
    $cities['fosses-la-ville'] = "Fosses-la-ville";
    $cities['furnes'] = "Furnes";
    $cities['gand'] = "Gand";
    $cities['geel'] = "Geel";
    $cities['gembloux'] = "Gembloux";
    $cities['genappe'] = "Genappe";
    $cities['genk'] = "Genk";
    $cities['gistel'] = "Gistel";
    $cities['grammont'] = "Grammont";
    $cities['hal'] = "Hal";
    $cities['halen'] = "Halen";
    $cities['hamont-achel'] = "Hamont-Achel";
    $cities['hannut'] = "Hannut";
    $cities['harelbeke'] = "Harelbeke";
    $cities['hasselt'] = "Hasselt";
    $cities['herck-la-ville'] = "Herck-la-Ville";
    $cities['herentals'] = "Herentals";
    $cities['herstal'] = "Herstal";
    $cities['herve'] = "Herve";
    $cities['hoogstraten'] = "Hoogstraten";
    $cities['houffalize'] = "Houffalize";
    $cities['huy'] = "Huy";
    $cities['izegem'] = "Izegem";
    $cities['jodoigne'] = "Jodoigne";
    $cities['la-louviere'] = "La Louvière";
    $cities['la-roche-en-ardenne'] = "La Roche-en-Ardenne";
    $cities['landen'] = "Landen";
    $cities['leau'] = "Léau";
    $cities['le-roeulx'] = "Le Roeulx";
    $cities['lessines'] = "Lessines";
    $cities['leuze-en-hainaut'] = "Leuze-en-Hainaut";
    $cities['liege'] = "Liège";
    $cities['lierre'] = "Lierre";
    $cities['limbourg'] = "Limbourg";
    $cities['lokeren'] = "Lokeren";
    $cities['lommel'] = "Lommel";
    $cities['looz'] = "Looz";
    $cities['lo-reninge'] = "Lo-Reninge";
    $cities['louvain'] = "Louvain";
    $cities['maaseik'] = "Maaseik";
    $cities['malines'] = "Malines";
    $cities['malmedy'] = "Malmedy";
    $cities['marche-en-famenne'] = "Marche-en-Famenne";
    $cities['menin'] = "Menin";
    $cities['messines'] = "Messines";
    $cities['mons'] = "Mons";
    $cities['montaigu-zichem'] = "Montaigu-Zichem";
    $cities['mortsel'] = "Mortsel";
    $cities['mouscron'] = "Mouscron";
    $cities['namur'] = "Namur";
    $cities['neufchateau'] = "Neufchâteau";
    $cities['nieuport'] = "Nieuport";
    $cities['ninove'] = "Ninove";
    $cities['nivelles'] = "Nivelles";
    $cities['ostende'] = "Ostende";
    $cities['ottignies-louvain-la-neuve'] = "Ottignies-Louvain-la-Neuve";
    $cities['oudenburg'] = "Oudenburg";
    $cities['peer'] = "Peer";
    $cities['peruwelz'] = "Péruwelz";
    $cities['philippeville'] = "Philippeville";
    $cities['poperinge'] = "Poperinge";
    $cities['renaix'] = "Renaix";
    $cities['rochefort'] = "Rochefort";
    $cities['roulers'] = "Roulers";
    $cities['saint-ghislain'] = "Saint-Ghislain";
    $cities['saint-hubert'] = "Saint-Hubert";
    $cities['saint-nicolas'] = "Saint-Nicolas";
    $cities['saint-trond'] = "Saint-Trond";
    $cities['saint-vith'] = "Saint-Vith";
    $cities['seraing'] = "Seraing";
    $cities['soignies'] = "Soignies";
    $cities['stavelot'] = "Stavelot";
    $cities['termonde'] = "Termonde";
    $cities['thuin'] = "Thuin";
    $cities['tielt'] = "Tielt";
    $cities['tirlemont'] = "Tirlemont";
    $cities['tongres'] = "Tongres";
    $cities['torhout'] = "Torhout";
    $cities['tournai'] = "Tournai";
    $cities['turnhout'] = "Turnhout";
    $cities['verviers'] = "Verviers";
    $cities['vilvorde'] = "Vilvorde";
    $cities['virton'] = "Virton";
    $cities['vise'] = "Visé";
    $cities['walcourt'] = "Walcourt";
    $cities['waregem'] = "Waregem";
    $cities['waremme'] = "Waremme";
    $cities['wavre'] = "Wavre";
    $cities['wervik'] = "Wervik";
    $cities['ypres'] = "Ypres";
    $cities['zottegem'] = "Zottegem";

    if(!$returnOptions) {
        return $cities;
    } else {
        $output = '';

        foreach($cities as $key => $city) {
            $selected = '';

            if($key == $currentCity) { $selected = ' selected="selected"'; }

            $output .= '<option value="'.$key.'"'.$selected.'>'.$city.'</option>';
        }

        return $output;
    }
}


/**
 * Récupération d'une ville en particulier suivant son "code"
 */
function getCity($code)
{
    $cities = getCities();

    if(isset($cities[$code])) {
        return $cities[$code];
    } else {
        return '';
    }
}

/**
 * Savoir si l'utilisateur est authentifié ou non. Retourne true ou false
 */
function isAuthenticated() {
    if(isset($_SESSION['logged_in'])) {
        return true;
    } else {
        return false;
    }
}

/**
 * USERS FUNCTIONS
 */

/**
 * Vérifie si un utilisateur avec ce nom / mot de passe existe en base.
 */
function checkCredentials($username, $password)
{
    $password = md5($password);

    $cnx = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PWD);

    $result = $cnx->prepare('SELECT * FROM user WHERE username = :username AND password = :password');
    $result->bindParam(':username', $username, PDO::PARAM_STR);
    $result->bindParam(':password', $password, PDO::PARAM_STR);
    $ok = $result->execute();

    $users = $result->fetchAll();

    $user = false;

    if(is_array($users) && count($users) == 1) {
        $user = $users[0];
    }

    $result->closeCursor();

    if($user !== false) {
        return $user;
    } else {
        return false;
    }
}

/**
 * Charge un utilisateur en particulier grâce à son ID
 */
function loadUser($id)
{
    $cnx = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PWD);

    $result = $cnx->prepare('SELECT * FROM user WHERE id = :id');
    $result->bindParam(':id', $id, PDO::PARAM_STR);
    $ok = $result->execute();

    $users = $result->fetchAll();

    $user = false;

    if(is_array($users)) {
        $user = $users[0];
    }

    $result->closeCursor();

    if($user !== false) {
        return $user;
    } else {
        return false;
    }
}

/**
 * Recherche un utilisateur par son nom d'utilisateur ou son adresse mail
 */
function searchUser($username, $mail = null)
{
    $emailSearch = '';
    if($mail != null) { $emailSearch = ' OR email = :mail'; }

    $cnx = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PWD);

    $result = $cnx->prepare('SELECT * FROM user WHERE username = :username' . $emailSearch);
    $result->bindParam(':username', $username, PDO::PARAM_STR);
    if($mail != null) { $result->bindParam(':mail', $mail, PDO::PARAM_STR); }
    $ok = $result->execute();

    $return = $result->fetchAll();

    $result->closeCursor();

    return $return;
}

/**
 * Permet de créer un utilisateur grâce aux infos données en paramètre
 */
function createUser($params)
{
    // Required fields
    if(!isset($params['username']) || !isset($params['password']) || !isset($params['email'])
       || !isset($params['city']) || !isset($params['type'])) {
        return false;
    }

    $cnx = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PWD);

    $fields = $datas = '';

    foreach($params as $key => $param) {
        if($fields != '') { $fields .= ','; }
        $fields .= $key;

        if($datas != '') { $datas .= ','; }
        $datas .= ':' . $key;
    }

    $fields = '(' . $fields . ')';
    $datas = '(' . $datas . ')';

    $prepQuery = 'INSERT INTO user' . $fields . ' VALUES ' . $datas;


    $req = $cnx->prepare($prepQuery);

    $ok = $req->execute($params);

    $req->closeCursor();

    if($ok) {
        return $cnx->lastInsertId();
    } else {
        return $ok;
    }
}

/**
 * Met à jour un utilisateur dans la base de donnée
 */
function updateUser($params)
{
    $cnx = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PWD);

    $fields = $datas = '';

    if(!isset($params['id'])) {
        return false;
    }

    $id = $params['id'];
    unset($params['id']);

    foreach($params as $key => $param) {
        if($fields != '') { $fields .= ', '; }
        $fields .= $key . ' = :' . $key;
    }

    $prepQuery = 'UPDATE user SET ' . $fields . ' WHERE id = :id';

    $req = $cnx->prepare($prepQuery);

    $params['id'] = $id;

    $ok = $req->execute($params);

    $req->closeCursor();

    return $ok;
}

/**
 * Recherche de plusieurs utilisateurs suivant des critères (type, animal, ville)
 */
function searchUsers($params)
{
    $cnx = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PWD);

    $query = 'SELECT user.*, pet.name as petname, pet.id as petid FROM user RIGHT JOIN pet ON pet.id_user = user.id WHERE';

    $requestParams = array();
    $where = '';

    // On ne recherche dans les pet-sitter ou both
    $where .= '(user.type = '.intval($params['type']).' OR user.type = '.TYPE_USER_BOTH.')';

    if(isset($params['pet'])) {
        if($params['type'] == TYPE_USER_PET_OWNER) {
            if($where != '') { $where .= ' AND '; }
            $petTypes = implode(',', $params['pet']);
            $where .= 'pet.type IN (' . $petTypes . ')';
        } else {
            if($where != '') { $where .= ' AND '; }
            $petWhere = '';
            foreach($params['pet'] as $petInterest){
                switch($petInterest) {
                    case TYPE_PET_CAT:
                        if($petWhere != '') { $petWhere .= ' OR '; }
                        $petWhere .= 'interest_cat = 1';
                        break;
                    case TYPE_PET_DOG:
                        if($petWhere != '') { $petWhere .= ' OR '; }
                        $petWhere .= 'interest_dog = 1';
                        break;
                    case TYPE_PET_BIRD:
                        if($petWhere != '') { $petWhere .= ' OR '; }
                        $petWhere .= 'interest_bird = 1';
                        break;
                    case TYPE_PET_RODENT:
                        if($petWhere != '') { $petWhere .= ' OR '; }
                        $petWhere .= 'interest_rodent = 1';
                        break;
                    case TYPE_PET_FISH:
                        if($petWhere != '') { $petWhere .= ' OR '; }
                        $petWhere .= 'interest_fish = 1';
                        break;
                    case TYPE_PET_OTHER:
                        if($petWhere != '') { $petWhere .= ' OR '; }
                        $petWhere .= 'interest_other = 1';
                        break;
                    default:
                        break;
                }
            }

            if($petWhere != '') { $where .= '(' . $petWhere . ')'; }
        }
    }

    if(isset($params['city']) && $params['city'] != 'ordre') {
        if($where != '') { $where .= ' AND '; }
        $where .= 'user.city = "' . $params['city'] . '"';
    }

    $query .= ' ' . $where . ' GROUP BY user.id';

    $result = $cnx->prepare($query);

    foreach($requestParams as $key => $param) {
        $type = PDO::PARAM_STR;
        if(is_int($param)) { $type = PDO:: PARAM_INT; }
        $result->bindParam($key, $param, $type);
    }

    $ok = $result->execute();

    $return = $result->fetchAll();

    $result->closeCursor();

    return $return;
}

/**
 * Charge plusieurs utilisateurs du site
 */
function loadUsers($limit = 10, $filters = array())
{
    $cnx = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PWD);

    $addCity = false;

    // Recherche uniquement dans les petsitters ou both
    $where = ' WHERE (u.type = '.TYPE_USER_PET_SITTER.' OR u.type = '.TYPE_USER_BOTH.')';

    if(is_array($filters) && count($filters) > 0) {
        if(isset($filters['city'])) {
            $addCity = true;
            $where .= ' AND u.city = :city';
        }
    }

    $result = $cnx->prepare('SELECT * FROM user u'.$where.' ORDER BY created_at DESC LIMIT :limit');
    $result->bindParam(':limit', $limit, PDO::PARAM_INT);
    if($addCity) { $result->bindParam(':city', $filters['city'], PDO::PARAM_STR); }
    $ok = $result->execute();

    $users = $result->fetchAll();

    $result->closeCursor();

    return $users;
}


/**
 * PET FUNCTIONS
**/
/**
 * Récupère l'animal d'un utilisateur en particulier (identifié par son ID)
 */
function getPetForUser($id)
{
    $id = intval($id);

    $cnx = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PWD);

    $result = $cnx->prepare('SELECT * FROM pet WHERE id_user = :id');
    $result->bindParam(':id', $id, PDO::PARAM_STR);
    $ok = $result->execute();

    $pets = $result->fetchAll();

    $pet = false;

    if(is_array($pets) && count($pets) > 0) {
        $pet = $pets[0];
    }

    $result->closeCursor();

    if($pet !== false) {
        return $pet;
    } else {
        return false;
    }
}

/**
 * Crée ou update un animal en base
 */
function savePet($params, $create = false)
{

    $cnx = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PWD);

    $fields = $datas = '';

    //INSERT INTO database (champ1, champ2, champ3) VALUES (valeur1, valeur2, valeur3)
    //UPDATE database SET champ1 = valeur1, champ2 = valeur2 WHERE id = id

    if($create) {
        foreach($params as $key => $param) {
            if($fields != '') { $fields .= ','; }
            $fields .= $key;

            if($datas != '') { $datas .= ','; }
            $datas .= ':' . $key;
        }

        $fields = '(' . $fields . ')';
        $datas = '(' . $datas . ')';

        $prepQuery = 'INSERT INTO pet' . $fields . ' VALUES ' . $datas;

        $req = $cnx->prepare($prepQuery);

        $ok = $req->execute($params);
    } else {
        if(!isset($params['id'])) {
            return false;
        }

        $id = $params['id'];
        unset($params['id']);

        foreach($params as $key => $param) {
            if($fields != '') { $fields .= ', '; }
            $fields .= $key . ' = :' . $key;
        }

        $prepQuery = 'UPDATE pet SET ' . $fields . ' WHERE id = :id';

        $req = $cnx->prepare($prepQuery);

        $params['id'] = $id;

        $ok = $req->execute($params);
    }

    $req->closeCursor();

    if($ok) {
        return true;
    } else {
        return $ok;
    }
}


/**
 * Charge un animal en base grâce a son ID
 */
function loadPet($id)
{
    $cnx = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PWD);

    $result = $cnx->prepare('SELECT * FROM pet WHERE id = :id');
    $result->bindParam(':id', $id, PDO::PARAM_STR);
    $ok = $result->execute();

    $pets = $result->fetchAll();

    $pet = false;

    if(is_array($pets) && count($pets)) {
        $pet = $pets[0];
    }

    $result->closeCursor();

    if($pet !== false) {
        return $pet;
    } else {
        return false;
    }
}

/**
 * Recherche de plusieurs animaux
 */
function searchPet($params)
{
    $cnx = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PWD);

    $query = 'SELECT pet.* FROM pet LEFT JOIN user ON pet.id_user = user.id WHERE';

    $requestParams = array();
    $where = '';

    if(isset($params['pet'])) {
        if($where != '') { $where .= ' AND '; }
        $petTypes = implode(',', $params['pet']);
        $where .= 'pet.type IN (' . $petTypes . ')';
    }

    if(isset($params['city']) && $params['city'] != 'ordre') {
        if($where != '') { $where .= ' AND '; }
        $where .= 'user.city = "' . $params['city'] . '"';
    }

    if($where == '') { $where = '1'; }

    $query .= ' ' . $where . ' GROUP BY pet.id';

    $result = $cnx->prepare($query);

    foreach($requestParams as $key => $param) {
        $type = PDO::PARAM_STR;
        if(is_int($param)) { $type = PDO:: PARAM_INT; }
        $result->bindParam($key, $param, $type);
    }

    $ok = $result->execute();

    $return = $result->fetchAll();

    $result->closeCursor();

    return $return;
}

/**
 * Récupère l'utilisateur d'un animal en particulier
 */
function getUserForPet($pet)
{
    if(!is_array($pet)) {
        $pet = loadPet($pet);
    }

    if(isset($pet['id_user'])) {
        $user = loadUser($pet['id_user']);

        return $user;
    } else {
        return false;
    }
}

/**
 * Charge plusieurs animaux par ancienneté avec limite et filtres optionnels
 */
function loadPets($limit = 10, $filters = array())
{
    $cnx = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PWD);

    $where = 'WHERE 1';
    $join = '';
    $addType = $addCity = false;

    if(is_array($filters) && count($filters) > 0) {
        if(isset($filters['type'])) {
            $addType = true;
            $where = 'WHERE p.type = :type';
        }
        if(isset($filters['city'])) {
            $addCity = true;
            $where .= ' AND u.city = :city';
            $join = ' LEFT JOIN user u ON u.id = p.id_user';
        }
    }

    $result = $cnx->prepare('SELECT * FROM pet p'.$join.' '.$where.' ORDER BY p.created_at DESC LIMIT :limit');
    $result->bindParam(':limit', $limit, PDO::PARAM_INT);

    if($addType) { $result->bindParam(':type', $filters['type'], PDO::PARAM_INT); }
    if($addCity) { $result->bindParam(':city', $filters['city'], PDO::PARAM_STR); }

    $ok = $result->execute();

    $pets = $result->fetchAll();

    $result->closeCursor();

    return $pets;
}

function _getPetType($type)
{
    switch($type)
    {
        case TYPE_PET_CAT:
            return 'Chat';
            break;
        case TYPE_PET_DOG:
            return 'Chien';
            break;
        case TYPE_PET_OTHER:
            return 'Autre';
            break;
    }
}

function _getGender($gender)
{
    switch($gender) {
        case 'female':
            return 'Femelle';
            break;
        case 'male':
            return 'Mâle';
            break;
        default:
            return 'undefined';
    }
}

function _getHealth($health)
{
    if($health) {
        return 'En bonne santé';
    } else {
        return 'Nécessite des soins';
    }
}

function _getAccomodation($acc)
{
    switch($acc) {
        case ACCOMODATION_HOUSE:
            return 'Maison';
        case ACCOMODATION_APPARTEMENT:
            return 'Appartement';
        case ACCOMODATION_OTHER:
            return 'Autre';
        default:
            return 'undefined';
    }
}

function _cleanText($text) 
{
    $text = htmlspecialchars($text);

    return $text;
}

function _getGardes($user)
{
    $gardes = '';

    if($user['interest_cat']) {
        if($gardes != '') { $gardes .= ', '; }
        $gardes .= 'chats';
    }

    if($user['interest_dog']) {
        if($gardes != '') { $gardes .= ', '; }
        $gardes .= 'chiens';
    }

    if($user['interest_rodent']) {
        if($gardes != '') { $gardes .= ', '; }
        $gardes .= 'rongeurs';
    }

    if($user['interest_bird']) {
        if($gardes != '') { $gardes .= ', '; }
        $gardes .= 'oiseaux';
    }

    if($user['interest_fish']) {
        if($gardes != '') { $gardes .= ', '; }
        $gardes .= 'poissons';
    }

    if($user['interest_other']) {
        if($gardes != '') { $gardes .= ', '; }
        $gardes .= 'autres';
    }

    return ucfirst($gardes);

}

function _getCorrectAge($pet)
{
    $type = '';

    if($pet['agetype'] == TYPE_AGE_MONTH) {
        $type = 'mois';
    } else {
        if($pet['age'] < 2) {
            $type = 'an';
        } else {
            $type = 'ans';
        }
    }

    return $pet['age'] . ' ' . $type;
}