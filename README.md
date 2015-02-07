#Quick Start
##Configure
edit following constants in database.php or include them from another file:

    define('DB_HOST', 'db_host');
    define('DB_PORT', '');
    define('DB_USERNAME', 'db_user');
    define('DB_PASSWORD', 'db_pass');
    define('DB_NAME', 'db_name');
    define('DB_CHARSET', 'utf8');

##Insert
    $helper = new DataInsertHelper('table_name');
    $helper->addInteger('field_1', 1);
    $helper->addString('field_2', 'string value');
    $result = $helper->execute();
    //this operation is same as executing SQL:
    //INSERT INTO table_name(field_1,field_2) VALUES(1,'string value');

##Delete
    $helper = new DataDeleteHelper('table_name');
    $helper->addConditionEqualString('username', 'foo');
    $result = $helper->execute();
    //this operation is same as executing SQL:
    //DELETE FROM table_name WHERE username='foo';

##Update
    $helper = new DataUpdateHelper('table_name');
    $helper->addConditionEqual('user_id', 15);
    $helper->setString('username', 'bar');
    $result = $helper->execute();
    //this operation is same as executing SQL:
    //UPDATE table_name SET username='bar' WHERE user_id=15;

##Query
    $helper = new DataQueryHelper('table_name');
    $helper->addConditionInKeywords('user_id',4);
    $helper->addOrderDesc('user_id');
    $result = $helper->query();
    //the $result is an associated array which it's key is database field name and value is the queried value from database.
    //this operation is same as executing SQL:
    //SELECT * FROM table_name WHERE user_id=4 ORDER BY user_id DESC
