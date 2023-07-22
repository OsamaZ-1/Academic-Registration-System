<?php
 class User_DAL extends DAL {
    public function getUserRequestToJoinSite(){
        $sql="SELECT
        users.Id,
        users.UserId,
        users.Fname,
        users.Lname,
        users.Email,
        users.Password
    FROM
        users
    WHERE
        users.Admin = 0";
    return $this->getData($sql);
    }
    public function getRequestUser($id){
        $conn = $this->getConnection();
        $id = mysqli_real_escape_string( $conn, $id );
        $sql="SELECT
        users.Id,
        users.UserId,
        users.Fname,
        users.Lname,
        users.Email,
        users.Password
    FROM
        users
    WHERE
        users.Admin = 0 AND users.Id=$id";
    return $this->getDataAssoc($sql);
    }
    public function deleteUser($id){
        $conn = $this->getConnection();
        $id = mysqli_real_escape_string( $conn, $id );
        $sql="DELETE FROM users WHERE users.Id=$id";
        return $this->update($sql);
    }
    public function getTotalRequestUsers(){
        $sql="SELECT COUNT(users.Id) AS 'total_request_users' FROM users";
        $res= $this->getDataAssoc($sql);
        return $res['total_request_users'];
    }

    public function getAdmins(){
        $sql="SELECT users.Id,users.Fname,users.Lname,users.Email,users.Password FROM users WHERE users.Admin=1";
        return $this->getData($sql);
    }
    public function addAdmin($fname,$lname,$email,$password){
        $conn = $this->getConnection();
        $fname= mysqli_real_escape_string( $conn, $fname );
        $lname= mysqli_real_escape_string( $conn, $lname );
        $email= mysqli_real_escape_string( $conn, $email );
        $password= mysqli_real_escape_string( $conn, $password );
        $sql="INSERT
        INTO
            users(
                users.Fname,
                users.Lname,
                users.Email,
                users.Password,
                users.Admin
            )
        VALUES(
            '$fname',
            '$lname',
            '$email',
            '$password',
            1
        )";
        return $this->update($sql);
    }
    public function deleteAdmin($id){
        $conn = $this->getConnection();
        $id = mysqli_real_escape_string( $conn, $id );
        $sql="DELETE FROM users WHERE users.Id=$id";
        return $this->update($sql);
    }
    public function addUser($id,$fname,$lname,$email,$password){
        $conn = $this->getConnection();
        $id= mysqli_real_escape_string( $conn, $id );
        $fname= mysqli_real_escape_string( $conn, $fname );
        $lname= mysqli_real_escape_string( $conn, $lname );
        $email= mysqli_real_escape_string( $conn, $email );
        $password= mysqli_real_escape_string( $conn, $password );
        
        $sql="INSERT
        INTO
            users(
                users.UserId,
                users.Fname,
                users.Lname,
                users.Email,
                users.Password,
                users.Admin
            )
        VALUES(
            '$id',
            '$fname',
            '$lname',
            '$email',
            '$password',
            0
        )";
        return $this->update($sql);
    }
 }
?>