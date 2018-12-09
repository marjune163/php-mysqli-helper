# `DataHelper` Class
## `__constructor`
signature:  
function __construct($initTable)

parameters:  
`$initTable` the table name to make operation in database. Same as `setTable` method.

## `filterKeyword` method
If a string would be a part of keyword in sql statement(that means it's not a part of 'string' in sql), use this function to filter unsecure characters.

signature:  
function filterKeyword($str)

## `filterString` method
Escape special character to make sure when a string is used as a part of 'string' in sql statement, it is secure and impossible to be injected.

signature:  
function filterString($str)

## `filterInteger` method
If a string would be an integer value in sql statement, use this function to filter disallowed characters.

signature:  
function filterInteger($str)

## `filterFloat` method
If a string would be an float value in sql statement, use this function to filter disallowed characters.

signature:  
function filterFloat($str)

## `singleQuote` method
Wrap string by a pair of single quotes.

signature:  
function singleQuote($str)

## `doubleQuote` method
Wrap string by a pair of double quotes.

signature:  
function doubleQuote($str)

## `backQuote` method
Wrap string by a pair of back quotes.

signature:  
function backQuote($str)

## `setTable` method
Set the table name in database to perform operation.

signature:  
function setTable($initTable)
