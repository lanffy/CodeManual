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
//print(dictionary["car"])
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

func greet(person:String, day: String?) -> String {
    return "Hello \(person) , today is : \(day ?? "a")"
}
greet(person: "Lanffy", day: nil)

func greet(_ person: String, on day: String) -> String {
    return "Hello \(person), Today is : \(day)"
}
greet("Lanffy", on: "2019-05-27")

func sortArray(scores: [Int]) -> (min: Int, max: Int, sum: Int, aver: Float) {
    var min: Int = scores[0], max: Int = scores[0], sum: Int = 0, aver: Float = 0.0, count: Int = 0
    for score in scores {
        if score > max {
            max = score
        } else if score < min {
            min = score
        }
        sum += score
        count += 1
    }
    aver = Float(sum) / Float(count)
    return (min, max, sum, aver)
}
var result = sortArray(scores: [1,2,3,4,5,6,7,8,9,8,7,6,5,4,3,2,1,10,1])
print(result)

func funcNest() -> Int {
    var y = 10
    func add(plus: Int) {
        y += plus
    }
    add(plus: 20)
    return y
}
print(funcNest())

func funcReturnFunc(plus: Int) -> ((Int) -> Int) {
    func sum(number: Int) -> Int {
        return number + plus
    }
    return sum
}
var increment = funcReturnFunc(plus: 10)
print(increment(10))
var numbers = [1,2,3]
var number2 = numbers.map({ (number: Int) -> Int in
    if number % 2 == 0 {
        return 0
    }
    return number * 2
})
print(number2)
var number3 = numbers.map({ number in 2 * number })
print(number3)
var sortNumber = numbers.sorted{$0 > $1}
print(sortNumber)

class Shape {
    var numberOfSide = 0
    var name = ""
    
    init(numberOfSide: Int, name: String) {
        self.numberOfSide = numberOfSide
        self.name = name
    }
    
    func toString() -> String {
        return "A Shape with \(numberOfSide) sides,It's name : \(name)"
    }
}
var shape = Shape(numberOfSide: 4, name: "Square")
//shape.numberOfSide = 33
print(shape.toString())

class Square: Shape {
    var sideLength: Double
    var perimeter: Double
    {
        get {
            return 3.0 * sideLength
        }
        set {
            sideLength = newValue / 3
        }
    }
    
    init(sideLength: Double, numberOfSide: Int, name: String) {
        self.sideLength = sideLength
        super.init(numberOfSide: numberOfSide, name: name)
    }
    
    func area() -> Double {
        return sideLength * sideLength
    }
    
    override func toString() -> String {
        return "A Shape with \(numberOfSide) sides,It's name : \(name), Area:\(self.area())"
    }
}
var square = Square(sideLength: 1.1, numberOfSide: 4, name: "square 1")
print(square.toString())
print(square.perimeter)

enum Rank: Int {
    case ace = 1
    case two, three, four, five, six, seven, eight, nine, ten
    case jack, queen, king
    
    func simpleDescriotion() -> String {
        switch self {
        case .ace:
            return "ace"
        case .jack:
            return "queen"
        case .king:
            return "king"
        default:
            return String(self.rawValue)
        }
    }
}
let ace = Rank.ace
let aceV = ace.rawValue
var aceCase = ace.simpleDescriotion()
print(ace)
print(aceV)
print(aceCase)

protocol ExampleProtocol {
    var simpleDescription: String { get }
    mutating func adjust()
}

class SimpleClass: ExampleProtocol {
    var simpleDescription: String = "A very simple class"
    var anotherProperty: Int = 69105
    func adjust() {
        simpleDescription += " Now 100% adjusted"
    }
}
var aC = SimpleClass()
aC.adjust()
let aD = aC.simpleDescription


struct SimpleStructure: ExampleProtocol {
    var simpleDescription: String = "A simple structure"
    mutating func adjust() {
        simpleDescription += " (adjusted)"
    }
}
var bS = SimpleStructure()
bS.adjust()
let bD = bS.simpleDescription

func makeArray<Item>(repeating item: Item, numberOfTimes: Int) -> [Item] {
    var result = [Item]()
    for _ in 0..<numberOfTimes {
        result.append(item)
    }
    return result
}
makeArray(repeating: "knock", numberOfTimes: 5)

let hexadecimalDouble = 0xC.3p0
let paddedDouble = 000123.456
let oneMillion = 1_000_000
let justOverOneMillion = 1_000_000.000_000_1

var optionalTypeName: Int? = 1
if let constantName = optionalTypeName {
    print("true \(constantName)")
} else {
    print("false")
}

let age = 3
assert(age >= 0, "age must bigger than 0")
let quotation = """
The White Rabbit put on his spectacles.  "Where shall I begin,
please your Majesty?" he asked.\

"Begin at the beginning," the King said gravely, "and go on
till you come to the end; then stop."
"""
print(quotation)

var stringArray: [String] = ["aa", "bb", "cc", "aa"]
var stringSet: Set<String> = ["aa", "bb", "cc", "aa"]
print(stringArray)
print(stringSet)


// loop for
for i in 1...10
{
    print(i)
}
for j in 1..<10
{
    print(j)
}
str = "Hello, iMooc!"
for c in str{
    print(c)
}
stringArray = ["aa", "bb"]
for item in stringArray{
    print(item)
}
for (index,item) in stringArray.enumerated() {
    print("\(index):\(item)")
}
for (index, item) in dictionary {
    print("\(index):\(item)")
}

// while loop
var whileI = 1
while whileI < 5
{
    print(whileI)
    whileI += 1
}

repeat
{
    print(whileI)
    whileI -= 1
} while whileI > 1


func sayHello(userName nickname:String, greeting:String = "Hello") -> String
{
    let str = "\(nickname),\(greeting)!"
    print(str)
    return str
}

sayHello(userName: "lanffy", greeting: "hello")
sayHello(userName: "lanffy")

func add(a:Int, b:Int, others:Int ...) -> Int
{
    var result = a + b
    for number in others
    {
        result += number
    }
    print(result)
    return result
}

add(a:1, b:2, others:3,4)

func toBinary(b:Int) -> String
{
    var result:String = ""
    var a = b
    while a != 0
    {
        result = String(a % 2) + result
        a /= 2
    }
    print(result)
    return result
}

toBinary(b: 6)

let anotherAdd:(Int, Int, Int ...) -> Int = add

anotherAdd(1,2,3)

stringArray = ["a", "b","c","d","abcd","abc","bdc","cd","d","dd"]

func compare(s1:String, s2:String) -> Bool
{
    if strlen(s1) == strlen(s2)
    {
        return s1 < s2
    }
    return strlen(s1) < strlen(s2)
}

print(stringArray.sorted(by: compare(s1:s2:)))

if #available(iOS 10, macOS 10.12, *) {
    print("mac OS 10.12 or later")
} else {
    print("mac OS less than 10.12")
}

func sayHello(userName nickname:String) -> String
{
    let str = "\(nickname) greeting!"
    print(str)
    return str
}
sayHello(userName: "lanffy")

func swap(a: inout Int, b: inout Int) {
    let temp = a
    a = b
    b = temp
}
a = 1
b = 2
swap(&a, &b)
print("a:\(a);b:\(b)")


enum CompassPoint: CaseIterable {
    case north
    case south
    case east
    case west
    case middle
}

var directionToHead = CompassPoint.south

switch directionToHead {
case .east:
    print("east")
case .north:
    print("north")
case .south, .west:
    print("south or west")
default:
    print("error")
}

for direction in CompassPoint.allCases {
    print(direction)
}

class A {
    var name: String = ""
    var age: Int = 0
}

var instanceA1 = A()
instanceA1.name = "lanffy"
instanceA1.age = 18
var instanceA2 = instanceA1
instanceA2.name = "lanffy2"
instanceA2.age = 19
print("instanceA1:name:\(instanceA1.name);age:\(instanceA1.age);;;instanceA2:name:\(instanceA2.name);age:\(instanceA2.age)")

let instanceA3 = A()
instanceA3.name = "lanffy3"
instanceA3.age = 20
let instanceA4 = instanceA3
instanceA4.name = "lanffy4"
instanceA4.age = 21
print("instanceA3:name:\(instanceA3.name);age:\(instanceA3.age);;;instanceA4:name:\(instanceA4.name);age:\(instanceA4.age)")

struct B {
    var name: String
    let age: Int
}

var instanB1 = B(name: "lanffy", age: 18)
print("instanB1:name:\(instanB1.name);age:\(instanB1.age)")
instanB1.name="lanffy2"
//instanB1.age = 19  age是常量，不能修改
print("instanB1:name:\(instanB1.name);age:\(instanB1.age)")

let instanB2 = B(name: "lanffy3", age: 20)
print("instanB2:name:\(instanB2.name);age:\(instanB2.age)")
//instanB2.name = "lanffy4"  instanceB2使用let修饰，代表常量，b其属性不可e更改
//instanB2.age = 21
