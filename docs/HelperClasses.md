# Helper Classes
Helper classes is help to execute sql command much easier.

# Class Hierarchy
```
DataHelper
         |
         +--------------------+
         |                    |
DataConditionHelper    DataInsertHelper
         |
         +-----------------+------------------+
         |                 |                  |
DataDeleteHelper    DataUpdateHelper    DataQueryHelper
```

# DataHelper
An abstract class for other data helper classes. providing the database connection, setting initial table name and string filter utility functions.

# DataInsertHelper
This class is help to insert a row into database table.

# DataConditionHelper
This helper adds a lot of methods to append conditions to sql `where` clause.

# DataDeleteHelper
This class is help to delete rows from database table.

# DataUpdateHelper
This class is help to update rows from database table.

# DataQueryHelper
This class is help to query data from database table.
