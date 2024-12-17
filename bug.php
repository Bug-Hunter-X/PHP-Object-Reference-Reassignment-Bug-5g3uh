In PHP, a common yet subtle error arises when dealing with references and objects.  Consider this scenario:

```php
class MyClass {
    public $value = 0;
}

function modifyObject(MyClass &$obj) {
    $obj = new MyClass(); // Assign a new object to the reference
    $obj->value = 10;
}

$myObject = new MyClass();
echo $myObject->value; // Output: 0
modifyObject($myObject);
echo $myObject->value; // Output: 0 (Unexpected!)
```

The unexpected output occurs because `$obj = new MyClass();` inside the `modifyObject` function doesn't modify the original object referenced by `$myObject`. Instead, it creates a *new* object and makes the reference `$obj` point to this *new* object.  The original `$myObject` remains unchanged.