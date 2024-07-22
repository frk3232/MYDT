from flask import Flask, render_template

app = Flask(__name__)

# Sample car data (you can replace this with actual data from a database or elsewhere)
cars = [
    {"brand": "Toyota", "model": "Corolla", "image": "car1.jpg"},
    {"brand": "Honda", "model": "Civic", "image": "car2.jpg"}
]

@app.route('/')
def index():
    return render_template('index.html', cars=cars)

if __name__ == '__main__':
    app.run(debug=True)
