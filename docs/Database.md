#`Database` Class
The Database class is serve for other higher level classes. Normally you don't need to use it directly.

##`execute` method
Execute a SQL statement and ignore the result.

Signature:
function execute($sql)

Parameters:
`$sql` an SQL string to be executed

##`query` method
Execute sql and returns result.

signature:
function query($sql)

parameters:
`$sql` an SQL string to be executed

returns:
Return result is an indexed array of entries. entry is an associated array which represents a row in database table with $field => $value.

##`queryAssoc` method
Execute sql and returns result.

signature:
function queryAssoc($sql, $keyField)

parameters:
`$sql` an SQL string to be executed
`$keyField` the key for the result array

returns:
Return result is an associated array with $keyField => $entry of entries. entry is an associated array which represents a row in database table with $field => $value.

##`queryEntry` method
Execute sql and return an array of entry. This is used to fetch single record.

signature:
function queryEntry($sql)

parameters:
`$sql` an SQL string to be executed

returns:
Returns an associated array which represents a row in database table with $field => $value.

##`queryValues` method
Execute sql and return an array of all entrys' first value. This is used to query a list of values.

signature:
function queryValues($sql)

parameters:
`$sql` an SQL string to be executed

returns:
Returns an indexed array which contains all result values.

##`queryValue` method
Execute sql and returns the first value of the first entry.

signature:  
function queryValues($sql)

parameters:
`$sql` an SQL string to be executed

returns:  
The result value in database table.
