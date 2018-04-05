# GatorHealth
### PhoneGap CLI

    $ phonegap create my-app --template blank

### Desktop

In your browser, open the file:

    /www/index.html

### Database Objects Usage
Include this file at the top of your file:

    include_once dirname(__FILE__) . '/Database/DBData.php';
    
Create an object of this class:

    $data = new DBData();
    
Insert Example:

    $table = "results";
    $fields = ['category', 'text'];
    $values = ['a category value', 'a text value'];
    if ($data->insert($table, $fields, $values)
        // Insert was successful, then do anything after insert.
    else
        // insert failed, show an error message.
           
Select Example:

    $query = "SELECT * FROM results WHERE id=1";
    $results = $data->select($query);
    while($field = $results->fetch_assoc())
    {
        echo $field['category'] . '<br>';
        echo $field['text'] . '<br>';
        echo '<br';
     }

Update Example:

     $table = "results";
     $field_to_update = "category";
     $new_value = "new category";
     $where_field = "id";
     $where_value = 1;
     if($data->update($table, $field_to_update, $new_value, $where_field, $where_value))
        // data was updated then, do anything else
     else
        // updated failed, show an error message.
        
Delete Example:
     
     $table = "results";
     $where_field = "id";
     $where_value = "1";
     if ($data->delete($table, $where_field, $where_value))
         // row was deleted then, do anything else
     else
         // delete failed, show an error message.
     
             
 
    
