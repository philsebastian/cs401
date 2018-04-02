<?php
session_start();

class Dao
{

	
    public function getConnection ()
    {
		$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

		$server = $url["host"];
		$username = $url["user"];
		$password = $url["pass"];
		$db = substr($url["path"], 1);
		echo "{$server} {$username} {$password} {$db}";
        //return new PDO("mysql:host={$server};dbname={$db}", $username, $password);
    }

    public function GetPermissionLevels()
    {
        // PHIL TODO -- change to query to builder of radio buttons
        $permissions = ["Student" => "1", "Teacher" => "2"];
        return $permissions;
    }

    public function GetUserIdAndRole(array $params)
    {
        $query = "SELECT
                         usernames.ID,
                         permissions.permissionLevelId
                  FROM (((allcreds
                         LEFT JOIN usernames ON usernames.ID = allcreds.usernameId)
                         LEFT JOIN permissions ON permissions.usernameId = allcreds.usernameId)
                         LEFT JOIN userinfo ON userinfo.usernameId = allcreds.usernameId)
                  WHERE
                         usernames.username = :username
                         AND
                         allcreds.login = :password
                         AND allcreds.inactivetime is null AND usernames.inactivetime is null AND permissions.inactivetime is null";

        $conn = $this->getConnection();
        $q = $conn->prepare($query);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $q->bindParam(":username", $params["username"]);
        $q->bindParam(":password", $params["password"]);
        $q->execute();
        $results = $q->fetchAll();
        return reset($results);
    }

    public function GetUserAccountInfo($userId)
    {
        $query = "SELECT
                         usernames.username,
                         userinfo.lastname,
                         userinfo.firstname,
                         userinfo.street,
                         userinfo.city,
                         userinfo.theState as state,
                         userinfo.zip,
                         permissions.permissionLevelId
                  FROM (((allcreds
                         LEFT JOIN usernames ON usernames.ID = allcreds.usernameId)
                         LEFT JOIN permissions ON permissions.usernameId = allcreds.usernameId)
                         LEFT JOIN userinfo ON userinfo.usernameId = usernames.ID)
                  WHERE
                         allcreds.usernameId = :userId
                         AND allcreds.inactivetime is null AND usernames.inactivetime is null AND permissions.inactivetime is null";

        $conn = $this->getConnection();
        $q = $conn->prepare($query);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $q->bindParam(":userId", $userId);
        $q->execute();
        $results = $q->fetchAll();
        return reset($results);
    }

    public function IsUsernameAvailable($username)
    {
        $query = "SELECT usernames.username FROM usernames WHERE usernames.username = :username";

        $conn = $this->getConnection();
        $q = $conn->prepare($query);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $q->bindParam(":username", $username);
        $q->execute();
        $results = $q->fetchAll();

        return (count($results) == 0);
    }

    public function GetNewUsernameId($username)
    {
        $insert = "INSERT INTO usernames (username) VALUES (:username);";
        $conn = $this->getConnection();
        $i = $conn->prepare($insert);
        $i->bindParam(":username", $username);
        $i->execute();

        $query = "SELECT usernames.ID FROM usernames WHERE username.username = :username AND username.inactivetime is null;";
        $q = $conn->prepare($query);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $q->bindParam(":username", $username);
        $q->execute();
        $results = $q->fetchAll();
        return $results['ID'];
    }

    public function GetNewUserInfoId($usernameId, array $params)
    {
        $insert = "INSERT INTO userinfo (usernameId, lastname, firstname, street, city, theState, zip)
                   VALUES (:usernameId, :lastname, :firstname, :street, :city, :theState, :zip)";
        $conn = $this->getConnection();
        $i = $conn->prepare($insert);
        $i->bindParam(":usernameId", $usernameId);
        $i->bindParam(":lastname", $params['lastname']);
        $i->bindParam(":firstname", $params['firstname']);
        $i->bindParam(":street", $params['street']);
        $i->bindParam(":city", $params['city']);
        $i->bindParam(":theState", $params['state']);
        $i->bindParam(":zip", $params['zip']);
        $i->execute();

        $query = "SELECT userinfo.ID FROM userinfo WHERE userinfo.usernameId = :usernameId AND userinfo.inactivetime is null;";
        $q = $conn->prepare($query);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $q->bindParam(":usernameId", $usernameId);
        $q->execute();
        $results = $q->fetchAll();
        return $results['ID'];
    }

    public function GetNewPasswordId($usernameId, $password)
    {
        $insert = "INSERT INTO allcreds (usernameId, login) VALUES (:usernameId, :password);";
        $conn = $this->getConnection();
        $i = $conn->prepare($insert);
        $i->bindParam(":usernameId", $usernameId);
        $i->bindParam(":password", $password);
        $i->execute();

        $query = "SELECT allcreds.ID FROM allcreds WHERE usernameId = :usernameId AND allcreds.inactivetime is null;";
        $q = $conn->prepare($query);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $q->bindParam(":usernameId", $usernameId);
        $q->execute();
        $results = $q->fetchAll();
        return $results['ID'];
    }

    public function GetPermissionsId($usernameId, $permissionlevelId)
    {
        $insert = "INSERT INTO permissions (usernameId, permissionLevelId) VALUES (:usernameId, :permissionLevelId);";
        $conn = $this->getConnection();
        $i = $conn->prepare($insert);
        $i->bindParam(":usernameId", $usernameId);
        $i->bindParam(":permissionLevelId", $permissionlevelId);
        $i->execute();

        $query = "SELECT ID FROM permissions WHERE usernameId = :usernameId AND inactivetime is null;";
        $q = $conn->prepare($query);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $q->bindParam(":usernameId", $usernameId);
        $q->execute();
        $results = $q->fetchAll();
        return $results['ID'];
    }

} // end Dao