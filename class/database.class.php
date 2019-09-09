<?

    if (!class_exists('database')) {

        class database {

            public function __construct($user, $password, $database, $host = 'localhost') {
                $this->user = $user;
                $this->password = $password;
                $this->database = $database;
                $this->host = $host;
            }

            /**
             * Database connection
             * $database->connect($host, $user, $password, $database);
             *
             * @var resource Database connection
             */

            protected function connect() {
                return new mysqli($this->host, $this->user, $this->password, $this->database);
            }

            /**
             * Database disconnect
             * $database->disconnect($database);
             *
             * @var resource Database disconnect
             */

            protected function disconnect() {
                // Connect to the database
                $db = $this->connect();
                //
                return mysqli_close($db);
            }

            /**
             * $database->query($sql);
             *
             * @param $sql - string (database table name)
             * @return
             *
             * Execute SQL query
             */

            public function query($sql) {
                // Connect to the database
                $db = $this->connect();
                // Query
                $result = $db->query($sql);
                // Get array of objects
                while ( $row = $result->fetch_object() ) {
                    $results[] = $row;
                }
                // Return the query result resource
                return $results;
            }
            
            /**
             * $database->show($table, $id);
             *
             * @param $table - string (database table name)
             * @param $id - int (record id)
             * @return
             *
             * Get database table record
             */
            
            public function show($table, $id) {
                // Connect to the database
                $db = $this->connect();
                // Sanitize the value
                $id = (int)$id;
                // Query
                $query = mysqli_query($db, "SELECT * FROM $table WHERE id='$id'") or die(mysqli_error($db));
                // Run and return the query result resource
                return mysqli_fetch_assoc($query);
            }

            /**
             * $database->store($table, $variables);
             *
             * @param $variables - array
             * @return
             *
             * Insert array in database as row
             */

            public function store($table, $variables) {
                // Connect to the database
                $db = $this->connect();
                // Retrieve the keys of the array (column titles)
                $columns = array_keys($variables);
                // Sanitization the values of the array (column values)
                $variables = array_map(array($db, 'real_escape_string'), array_values($variables));
                // Build the query
                $sql = "INSERT INTO " . $table . " (`".implode('`,`', $columns)."`) VALUES('".implode("','", $variables)."')";
                // Run and return the query result resource
                return mysqli_query($db, $sql) or die(mysqli_error($db));
            }

            /**
             * $database->update($table, $data, $id_field, $id_value);
             *
             * @param $data - array
             * @return
             *
             * Update database row with array
             */

            public function update($table, $data, $id_field, $id_value) {
                // Connect to the database
                $db = $this->connect();
                //
                foreach ($data as $field => $value) {
                    $fields[] = sprintf("`%s` = '%s'", $field, mysqli_real_escape_string($db, $value));
                }
                //
                $field_list = join(',', $fields);
                // Query
                $query = sprintf("UPDATE `%s` SET %s WHERE `%s` = %s", $table, $field_list, $id_field, intval($id_value));
                // Run and return the query result resource
                return mysqli_query($db, $query) or die(mysqli_error($db));
            }

            /**
             * $database->destroy($table, $id);
             *
             * @param $table - string (database table name)
             * @param $id - int (record id)
             * @return
             *
             * Delete record from database table
             */

            public function destroy($table, $id) {
                // Connect to the database
                $db = $this->connect();
                // Prepary our query for binding
                $stmt = $db->prepare("DELETE FROM {$table} WHERE id = ?");
                // Dynamically bind values
                $stmt->bind_param('d', $id);
                // Execute the query
                $stmt->execute();
                // Check for successful insertion
                if ( $stmt->affected_rows ) {
                    return true;
                }
            }

        }
        
    }

?>