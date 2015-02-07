#`DataConditionHelper` class
For generating sql Where statement.

##Single value condition
`addConditionGreaterThan` method adds a "field > value" condition.  
`addConditionGreaterThanEqual` method adds a "field >= value" condition.  
`addConditionLessThan` method adds a "field < value" condition.  
`addConditionLessThanEqual` method adds a "field <= value" condition.  
`addConditionEqual` method adds a "field = value" condition.  
`addConditionEqualString` method adds a "field = 'value'" condition.  
`addConditionContains` method adds a "field LIKE '%value%'" condition.  
`addConditionStartsWith` method adds a "field LIKE 'value%'" condition.  
`addConditionEndsWith` method adds a "field LIKE '%value'" condition.  

signatures:  
function method($field, $value)

parameters:  
`$field` the field name of the table  
`$value` the condition value of the field

##Multi value condition
`addConditionInKeywords` method adds a "field IN (value, ...)" condition.  
`addConditionInStrings` method adds a "field IN ('value', ...)" condition.  

signatures:  
function method($field, $values)

parameters:  
`$field` the field name of the table  
`$values` an indexed array represents the condition values of the field.
