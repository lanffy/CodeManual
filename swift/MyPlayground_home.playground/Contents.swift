import UIKit

var str = "Hello, playground"

print(str + " aaaaa")

let maxNum = 32

var minNum:Int = 10

print(maxNum + minNum)

minNum = 20

print(maxNum + minNum)


if maxNum > minNum
{
    print("right")
}
else
{
    print("false")
}

var tuples = (1,2,3,4,5,"string",0.1234,name:"name")

print(tuples,tuples.0,tuples.name)

var a:Int

a = 1

var b:Int

b = 1

str = "Hello, world"
for c in str
{
    print("\(c)")
}

str = "Hello, playground"
print("Hello, world!")

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

struct Location {
    var latitude: Double = 0
    var longitude: Double = 0
}

struct Location2 {
    var latitude: Double = 0
    var longitude: Double = 0
    
    init(coordinateString: String) {
        let coordinateArr = coordinateString.split(separator: ",")
        let first = coordinateArr[0]
        let second = coordinateArr[1]
        latitude = Double(first)!
        longitude = Double(second)!
    }
    
    init(latitude: Double, longitude: Double) {
        self.latitude = latitude
        self.longitude = longitude
    }
    
    func printLocation() {
        print("The Location:\(self.latitude).\(self.longitude)")
    }
    
    func isNorth() -> Bool {
        return self.latitude > 0
    }
    
    func isSouth() -> Bool {
        return !self.isNorth()
    }
}

var appLocation: Location = Location(latitude: 37.3230, longitude: -122.0322)
print(appLocation)
print(appLocation.latitude, appLocation.longitude)

appLocation.latitude = 0
print(appLocation.latitude, appLocation.longitude)

var home: Location2 = Location2(coordinateString: "1,2")
print(home)

var com: Location2 = Location2(latitude: 1.1, longitude: 2.2)
print(com)

// 结构体是一种值类型,复制的时候拷贝，而不是引用传递
// 枚举类型也是值类型
struct Point {
    var x = 0.0
    var y = 0.0
}
var p1 = Point(x:1.0, y:2.0)
print(p1.x)

var p2 = p1
p2.x = 2.0
print(p2.x)


class Person {
    var firstName: String
    var lastName: String
    
    init(firstName: String, lastName: String) {
        self.firstName = firstName
        self.lastName = lastName
    }
    
    init?(fullName: String) {
        let spaceIndex = fullName.split(separator: " ")
        if spaceIndex.count < 2 {
            return nil
        }
        let f = spaceIndex[0]
        let l = spaceIndex[1]
        if f.isEmpty || l.isEmpty {
            return nil
        }
        self.firstName = String(f)
        self.lastName = String(l)
    }
    
    func fullName() {
        print("Name:\(self.lastName) \(self.firstName)")
    }
}

var person1 = Person(firstName: "a", lastName: "b")
var person2 = Person(fullName: "a b")
var person3 = Person(fullName: "a")

person1.fullName()
person2?.fullName()
person3?.fullName()

