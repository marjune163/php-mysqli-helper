# `DataInsertHelper` class
For generating sql Insert statement.

## `addString` method
Add a string value to insert.

signature:  
function addString($field, $value)

parameters:  
`$field` the field name of the table  
`$value` the value that will be inserted to the `$field` field in table

## `addKeyword` method
Add a keyword value(which means only contains normal characters) to insert.

signature:  
function addKeyword($field, $value)

parameters:  
`$field` the field name of the table  
`$value` the value that will be inserted to the `$field` field in table

## `addInteger` method
Add an integer value to insert.

signature:  
function addInteger($field, $value)

parameters:  
`$field` the field name of the table  
`$value` the value that will be inserted to the `$field` field in table

## `addFloat` method
Add a float value to insert.

signature:  
function addFloat($field, $value)

parameters:  
`$field` the field name of the table  
`$value` the value that will be inserted to the `$field` field in table

## `addValues` method
Add a lot of values to insert at once. For each value, if it is a string, call `addString` internally; if it is a float value, call `addFloat` internally; if it is an integer value, call `addInteger` internally; otherwise call `addKeyword` internally.

signature:  
function addValues($arrValues)

parameters:  
`$arrValues` an associated array which it's key is field name and it's value is the value to be inserted.

## `execute` method
Perform the insert sql statement immediately.

signature:  
function execute()
