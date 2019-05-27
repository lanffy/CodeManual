import UIKit

var str = "Hello, playground"
print("Hello, world!")

var a:Int = 3,b:Int = 5

print("a+b=\(a+b)")

var stringList = ["apple", "orange", "banana"]
print(stringList[0])
stringList[2] = "pear"
print(stringList)

var dictionary = [
    "frute":"apple",
    "car":"BMW",
]
print(dictionary)
print(dictionary["car"])
dictionary["car"] = "Ben"
print(dictionary)


var optinalString: String? = "hello"
print(optinalString == nil)
var greeting: String? = "Lanffy"
if let name = greeting {
    print("Hello + \(name)")
}
greeting = nil
if let name = greeting {
    print("Hello + \(name)")
}else {
    print("failed")
}


let vegetable = "watercress"
switch vegetable {
case "celery":
    print("celert")
case "cucumber", "watercress":
    print("cucumber or watercress")
case let x where x.hasSuffix("pepper"):
    print("It is suffix whit pepper")
default:
    print("nothing")
}
