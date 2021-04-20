class Clock {

    constructor(canvasID, hour, minute, second) {
        this.canvas = document.getElementById(canvasID);
        this.ctx = this.canvas.getContext("2d");
        this.radius = this.canvas.height / 2;
        this.ctx.translate(this.radius, this.radius);
        this.radius = this.radius * 0.90;

        this.drawClock(this.ctx, this.radius, hour, minute, second);
        setInterval(() => this.drawClock(this.ctx, this.radius, hour, minute, second), 1000);
    }

    drawClock(ctx, radius, hour, minute, second) {
        this.drawFace(ctx, radius);
        this.drawNumbers(ctx, radius);
        this.drawTime(ctx, radius, hour, minute, second);

    }

    drawFace(ctx, radius) {
        var grad;
        ctx.beginPath();
        ctx.arc(0, 0, radius, 0, 2 * Math.PI);
        ctx.fillStyle = '#f6f5f3';
        ctx.fill();
        ctx.strokeStyle = '#333';
        ctx.lineWidth = radius * 0.022;
        ctx.beginPath();
        ctx.arc(0, 0, radius * 0.1, 0, 2 * Math.PI);
        ctx.fillStyle = '#333';
        ctx.fill();
    }

    drawNumbers(ctx, radius) {
        var ang;
        var num;
        ctx.font = radius * 0.17 + "px arial";
        ctx.textBaseline = "middle";
        ctx.textAlign = "center";
        for (num = 1; num < 13; num++) {
            ang = num * Math.PI / 6;
            ctx.rotate(ang);
            ctx.translate(0, -radius * 0.85 + 7);
            ctx.rotate(-ang);
            ctx.fillText(num.toString(), 0, 0);
            ctx.rotate(ang);
            ctx.translate(0, radius * 0.85 - 7);
            ctx.rotate(-ang);
        }
    }

    drawTime(ctx, radius, hour, minute, second) {
        //var now = new Date();
        //var hour = now.getHours();
        //var minute = now.getMinutes();
        //var second = now.getSeconds();
        //hour
        hour = hour % 12;
        hour = (hour * Math.PI / 6) +
            (minute * Math.PI / (6 * 60)) +
            (second * Math.PI / (360 * 60));
        this.drawHand(ctx, hour, radius * 0.5, radius * 0.07);
        //minute
        minute = (minute * Math.PI / 30) + (second * Math.PI / (30 * 60));
        this.drawHand(ctx, minute, radius * 0.8, radius * 0.07);
        // second
        second = (second * Math.PI / 30);
        this.drawHand(ctx, second, radius * 0.9, radius * 0.02, 1);
    }

    drawHand(ctx, pos, length, width, witch = 0) {

        ctx.beginPath();
        ctx.lineWidth = width;
        //ctx.lineCap = "round";
        ctx.moveTo(0, 0);
        ctx.rotate(pos);
        ctx.lineTo(0, -length);
        ctx.stroke();
        ctx.rotate(-pos);
    }
}