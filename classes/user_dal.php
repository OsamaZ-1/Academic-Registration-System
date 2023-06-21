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
 }
?>