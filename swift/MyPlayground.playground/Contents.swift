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

var b:Int?

b = nil

if b == nil
{
    print("b value is : \(a)")
}


str = "Hello, world"
for c in str
{
    print("\(c)")
}
