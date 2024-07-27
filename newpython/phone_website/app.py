from flask import Flask, render_template

app = Flask(__name__)

# Sample data for phones
PHONES = [
    {
        'name': 'Samsung Galaxy M35',
        'image': 'p1.png',
        'price': '₹18,999'
    },
    {
        'name': 'OnePlus Nord 4',
        'image': 'p2.jpg',
        'price': '₹27,999'
    },
    {
        'name': 'CMF Phone 1',
        'image': 'p3.jpg',
        'price': '₹15,599'
    },
    {
        'name': 'OnePlus Nord CE 4 Lite 5G',
        'image': 'p4.png',
        'price': '₹18,699'
    },
    {
        'name': 'OPPO F27 Pro Plus',
        'image': 'p5.png',
        'price': '₹27,000'
    },{
        'name': 'Xiaomi Redmi 13 5G',
        'image': 'p6.jpg',
        'price': '₹12,099'
    }
    

    # Add more phones as needed
]

@app.route('/')
def index():
    return render_template('index.html', phones=PHONES)

if __name__ == '__main__':
    app.run(debug=True)
