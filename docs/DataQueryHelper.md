# `DataQueryHelper` class
To make sql query much easier.

## `addField` method
Adding a field name to query in sql Select statement.

signature:  
function addField($field)

## `addFields` method
Adding many field names to query in sql Select statement.

signature:  
function addFields($fields)

parameters:  
`$fields` an indexed array which contains multi field names to be queried.

## `addAliasField` method
Adding a field name to query in sql Select statement but change the result field name by adding "AS newfield" in sql.

signature:  
function addAliasField($field, $alias)

parameters:  
`$field` original field name  
`$alias` aliased field name

## `addAliasFields` method
Adding many alias field names to sql Select statement.

signature:  
function addAliasFields($fields)

parameters:  
`$fields` an associated array which it's key is original field name and it's value is the aliased field name.

## `addConditionInQuery` method
Adding a sub query, and put it into IN clause as a condition.

signature:  
function addConditionInQuery($field, DataQueryHelper $subQuery)

parameters:  
`$field` the field name of the condition  
`$subQuery` another DataQueryHelper object that represents a sub query. It should query a single field, otherwise the whole query will not work.

## `addOrderAsc` method
Adding an ascending sorting by a field.

signature:  
function addOrderAsc($field)

## `addOrdersAsc` method
Adding ascending sorting by many fields.

signature:  
function addOrdersAsc($fields)

parameters:  
`$fields` an indexed array that contains field names to be ordered

## `addOrderDesc` method
Adding an descending sorting by a field.

signature:  
function addOrderDesc($field)

## `addOrdersDesc` method
Adding descending sorting by many fields.

signature:  
function addOrdersDesc($fields)

parameters:  
`$fields` an indexed array that contains field names to be ordered

## `query` method
Execute sql and returns result.

signature:  
function query()

returns:  
Return result is an indexed array of entries. entry is an associated array which represents a row in database table with $field => $value.

## `queryAssoc` method
Execute sql and returns result.

signature:  
function queryAssoc()

returns:  
Return result is an associated array with $keyField => $entry of entries. entry is an associated array which represents a row in database table with $field => $value.

## `queryEntry` method
Execute sql and return an array of entry. This is used to fetch single record.

signature:  
function queryEntry()

returns:  
Returns an associated array which represents a row in database table with $field => $value.

## `queryValues` method
Execute sql and return an array of all entrys' first value. This is used to query a list of values.

signature:  
function queryValues()

returns:  
Returns an indexed array which contains all result values.

## `queryValue` method
Execute sql and returns the first value of the first entry.

signature:  
function queryValues()

returns:  
The result value in database table.
