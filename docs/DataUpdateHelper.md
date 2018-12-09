# `DataUpdateHelper` class
For generating sql Update statement.


## Single value condition
`setString` method updates a string field.  
`setKeyword` method updates a keyword field(which contains only normal characters).  
`setInteger` method updates an integer field.  
`setFloat` method updates a float field.  

## Multi value condition
`setValues` method updates multi fields by values. For each value, if it is a string, call `addString` internally; if it is a float value, call `addFloat` internally; if it is an integer value, call `addInteger` internally; otherwise call `addKeyword` internally.

signatures:  
function setValues($arrValues)

parameters:  
`$arrValues` an associated array which it's key is field name and it's value is the value to be updated.
