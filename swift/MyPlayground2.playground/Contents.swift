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
