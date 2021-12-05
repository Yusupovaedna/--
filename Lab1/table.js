// Получаем canvas элемент
let canvas = document.getElementById('canvas');

let ctx = canvas.getContext('2d');

color =  '#b9dfff';
ctx.fillStyle = color;
ctx.fillRect(250, 50 , 200, 200);
// ctx.fillRect(150,150,100,100);

ctx.beginPath();
ctx.moveTo(150, 250);
ctx.lineTo(250, 250);
ctx.lineTo(250, 150);
ctx.fillStyle = color;
ctx.fill();
ctx.beginPath();
ctx.arc(250, 250, 200,2*Math.PI, 0.5*Math.PI, false);//круг
ctx.moveTo(450, 250);
ctx.lineTo(250, 450);
ctx.lineTo(250, 250);
// ctx.arc(300, 150, 50, 0.5*Math.PI, 1.5*Math.PI, true);
ctx.fillStyle = color;
ctx.fill();

ctx.fillStyle = "black"; // Задаём чёрный цвет для линий
ctx.lineWidth = 2.0; // Ширина линии
ctx.beginPath(); // Запускает путь
ctx.moveTo(250, 10); // Указываем начальный путь
ctx.lineTo(250, 490); // Перемешаем указатель
// Ещё раз перемешаем указатель
ctx.moveTo(10,250); // Указываем начальный путь
ctx.lineTo(490, 250); // Перемешаем указатель

ctx.stroke(); // Делаем контур
// Цвет для рисования
ctx.fillStyle = "black";
// Цикл для отображения значений по Y
ctx.moveTo(250,250);

let lab1 = ["-R", "-R/2", "", "R/2", "R"];
for(let i = 0; i < 5; i++) {
    ctx.fillText(lab1[i], 265, 50+ i*100);
    ctx.beginPath();
    ctx.moveTo(240,50+ i*100);
    ctx.lineTo(260, 50+ i*100);
    ctx.stroke();
}
for(let i = 0; i < 5; i++) {
    ctx.fillText(lab1[i], 50+ i*100,235);
    ctx.beginPath();
    ctx.moveTo(50+ i*100,240);
    ctx.lineTo(50+ i*100,260);
    ctx.stroke();
}
ctx.beginPath();
ctx.moveTo(480, 240);
ctx.lineTo(490, 250);
ctx.lineTo(480, 260);
ctx.stroke();
ctx.fillStyle = "black";

ctx.beginPath();
ctx.moveTo(240, 20);
ctx.lineTo(250, 10);
ctx.lineTo(260, 20);
ctx.stroke();
ctx.fillStyle = "black";

for(let i = 0; i < 5; i++) {
    ctx.fillText(lab1[i], 50+ i*100,235);
    ctx.beginPath();
    ctx.moveTo(50+ i*100,240);
    ctx.lineTo(50+ i*100,260);
    ctx.stroke();
}