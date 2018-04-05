<?php
/**
 * File: DBData.php
 * Author: GatorHealth team
 * Description: This class contains useful methods to select, insert, update and delete data from any table
 *              from the database. It also takes care of closing the db connection automatically avoiding memory leaks
 *              across the application.
 * USAGE:
 *       1. Include this file at the top of your file: include_once dirname(__FILE__) . '/Database/DBData.php';
 *       2. Create an object of this class: $data = new DBData();
 *       3. Example Insert:
 *             $table = "results";
 *             $fields = ['category', 'text'];
 *             $values = ['a category value', 'a text value'];
 *             if ($data->insert($table, $fields, $values)
 *             {
 *                   // Insert was successful, then do anything after insert.
 *             }
 *             else{
 *                  // insert failed, show an error message.
 *             }
 *        4. Example Select with table results:
 *             $query = "SELECT * FROM results WHERE id=1";
 *             $results = $data->select($query);
 *             while($field = $results->fetch_assoc())
 *             {
 *                 echo $field['category'] . '<br>';
 *                 echo $field['text'] . '<br>';
 *                 echo '<br';
 *             }
 *        5. Example with Update:
 *             $table = "results";
 *             $field_to_update = "category";
 *             $new_value = "new category";
 *             $where_field = "id";
 *             $where_value = 1;
 *             if($data->update($table, $field_to_update, $new_value, $where_field, $where_value))
 *             {
 *                 // data was updated then, do anything else
 *             }
 *             else {
 *                 // updated failed, show an error message.
 *             }
 *        6. Example with Delete:
 *            $table = "results";
 *            $where_field = "id";
 *            $where_value = "1";
 *            if ($data->delete($table, $where_field, $where_value))
 *            {
 *                 // row was deleted then, do anything else
 *            }
 *            else {
 *                 // delete failed, show an error message.
 *            }
 *
 *
 * IMPORTANT: There is no need to manually close the database connection since all methods do it automatically
 */

/* Uncomment the next three lines of code only for error checking */
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// include connection class
include_once dirname(__FILE__) . '/DBConn.php';

class DBData
{
    /**
     * DBData empty constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return bool|mysqli|null the db connection
     */
    public function get_connection()
    {
        $conn_object = new DBConn();
        if ($conn_object->isUsrConnectedToDB())
            return $conn_object->getConnection();
        return null;
    }

    /**
     * Inserts data into a MsqlTable
     * @param $query
     * @return bool
     */
    public function insert($table, $fields, $values)
    {
        $conn = $this->get_connection();
        if ($conn != null) {
            $query = "INSERT INTO " . $table . " (";
            $len_fields = count($fields);
            $index = 0;
            foreach ($fields as $field) {
                if ($index == ($len_fields - 1))
                    $query .= $field . ") VALUES (";
                else
                    $query .= $field . ", ";
                $index++;
            }
            $len_values = count($values);
            $index = 0;
            foreach ($values as $value) {
                if ($index == ($len_values - 1))
                    $query .= "'$value'" . ")";
                else
                    $query .= "'$value'" . ", ";
                $index++;
            }
            if ($conn->query($query) === TRUE) {
                $conn->close();
                return true;
            } else {
                echo "Error: " . $query . "<br>" . $conn->error;
            }
        }
        else {
            echo $conn->error;
        }
        $conn->close();
    }

    /**
     * Read data from the database
     * @param $query the query
     * @return bool|int|mysqli_result
     */
    public function select($query)
    {
        $conn = $this->get_connection();
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $conn->close();
            return $result; // fields data
        }
        $conn->close();
        return 0; // no results returnes
    }



    /**
     * Updates a field or table in the database
     * @param $query
     * @return bool
     */
    public function update($table, $field_to_update, $new_value, $where_field, $where_value)
    {
        $conn = $this->get_connection();
        if ($conn != null) {

            $query = "UPDATE $table SET $field_to_update='$new_value' WHERE $where_field='$where_value'";
            if ($conn->query($query) === TRUE) {
                $conn->close();
                return true;
            }
            else {
                echo $conn->error;
            }
        }
        $conn->close();
        return false;

    }

    /**
     * Deletes a row from a table
     * @param $table
     * @param $field_to_delete
     * @param $value_to_delete
     * @return bool
     */
    public function delete($table, $field_to_delete, $value_to_delete)
    {
        $conn = $this->get_connection();
        if ($conn != null) {

            $query = "DELETE FROM $table WHERE $field_to_delete='$value_to_delete'";
            if ($conn->query($query) === TRUE) {
                $conn->close();
                return true;
            }
            else {
                return false;
            }
        }
        $conn->close();
        return false;
    }
}