import UIKit

let colors = [
    "Air Force Blue":(red:93,green:138,blue:168),
    "Bittersweet":(red:254,green:111,blue:94),
    "Canary Yellow":(red:255,green:239,blue:0),
    "Dark Orange":(red:255,green:140,blue:0),
    "Electric Violet":(red:143,green:0,blue:255),
    "Fern":(red:113,green:188,blue:120),
    "Gamboge":(red:228,green:155,blue:15),
    "Hollywood Cerise":(red:252,green:0,blue:161),
    "Icterine":(red:252,green:247,blue:94),
    "Jazzberry Jam":(red:165,green:11,blue:94)
]

print(colors)

var backView = UIView(frame: CGRect.init(x: 0.0, y: 0.0, width: 320.0, height: CGFloat(colors.count * 50)))

backView.backgroundColor = UIColor.black

backView

var index = 0
for (colorName,rgbTuple) in colors {
    let colorStripe = UILabel.init(frame: CGRect.init(x: 0.0, y: CGFloat(index * 50 + 5), width: 320.0, height: 40.0))
    colorStripe.backgroundColor = UIColor.init(
        red: CGFloat(rgbTuple.red) / 255.0,
        green: CGFloat(rgbTuple.green) / 255.0,
        blue: CGFloat(rgbTuple.blue) / 255.0,
        alpha: 1.0
    )
    
    
    
    let colorNameLable = UILabel.init(frame: CGRect.init(x: 0.0, y: 0.0, width: 300.0, height: 40.0))
    colorNameLable.font = UIFont.init(name: "Arial", size: 24.0)
    colorNameLable.textColor = UIColor.black
    colorNameLable.textAlignment = NSTextAlignment.right
    colorNameLable.text = colorName
    
    colorStripe.addSubview(colorNameLable)
    backView.addSubview(colorStripe)
    index += 1
    
}

backView
