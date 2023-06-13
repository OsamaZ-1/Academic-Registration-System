<?php
    class DAL{
        private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $dbname = "FacultyOfScience";

        public function getConnection(){
            ini_set('max_execution_time', '300');
            return new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        }

        public function getData($sql) {
            $conn = $this->getConnection();
            if ( $conn->connect_error ) {
                die( 'Connection failed: ' . $conn->connect_error );
            }
    
            $result = $conn->query($sql);
            if ( $result ) {
                $array = $result->fetch_all( MYSQLI_ASSOC );
                $conn->close();
                return $array;
            } else {
                echo mysqli_error( $conn );
            }
        }

        public function getDataAssoc($sql)
        {
            $conn = $this -> getConnection();
            if ( $conn->connect_error ) {
                die( 'Connection failed: ' . $conn->connect_error );
            }
            $result = $conn -> query($sql);

            if($result && $result -> num_rows >0)
                return $result -> fetch_assoc();

            return 0;
        }

        public function update($sql) {
            
            $conn = $this->getConnection();

            if ($conn->connect_error) {
                die( 'Connection failed: ' . $conn->connect_error );
            }
           
            $result = $conn -> query($sql);
            return $result;
        }
    }
?>