class ClockSecond {

    /*'canvasID' => 'canvas',
    'timezone' => 'Europe/Tirane',
    'dateID' => 'date',
    'language' => '<?= Yii::$app->language; ?>'*/

    constructor(params) {
        //console.log(params.dateID);
        this.dateDiv = document.getElementById(params.dateID);
        this.canvas = document.getElementById(params.canvasID);
        this.ctx = this.canvas.getContext("2d");
        this.radius = this.canvas.height / 2;
        this.ctx.translate(this.radius, this.radius);
        this.radius = this.radius * 0.90;
        this.local = params.language;
        console.log(this.local);
        this.drawClock(this.ctx, this.radius, params.timeZone, params.timeZoneUTC);
        //this.drawFace(this.ctx, this.radius);
        setInterval(() => this.drawClock(this.ctx, this.radius, params.timeZone, params.timeZoneUTC), 1000);
    }

    drawClock(ctx, radius, timeZone, timeZoneUTC) {
        this.drawFace(ctx, radius);
        //this.drawNumbers(ctx, radius);
        this.drawLines(ctx);
        this.drawTime(ctx, radius, timeZone, timeZoneUTC);


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

    drawTime(ctx, radius, timeZone, timeZoneUTC) {


        if (timeZone != ''){
            this.moments = new moment();
            this.hour = this.moments.tz(timeZone).format('h');
            this.minute = this.moments.tz(timeZone).format('mm');
            this.second = this.moments.tz(timeZone).format('ss');
            this.offset = this.moments.utcOffset();
            this.offset = (this.offset/60 > 0) ? '+' + this.offset/60 : this.offset/60;

            this.dateDiv.innerHTML =
                //this.moments.tz(timeZone).format('LL') +
                //this.moments.tz(timeZone).format('YYYY-MM-DD') +
                ' UTC ' +
                this.offset;


        }

        if (timeZoneUTC != 0){
            this.moments = new moment().utcOffset(timeZoneUTC);
            this.hour = this.moments.format('h');
            this.minute = this.moments.format('mm');
            this.second = this.moments.format('ss');
            this.offset = this.moments.utcOffset();
            this.offset = (this.offset/60 > 0) ? '+' + this.offset/60 : this.offset/60;

            this.dateDiv.innerHTML =
                //this.moments.format('LL') +
                //this.moments.format('YYYY-MM-DD') +
                ' UTC ' +
                this.offset;

        }



        this.hour = this.hour % 12;
        this.hour = (this.hour * Math.PI / 6) +
            (this.minute * Math.PI / (6 * 60)) +
            (this.second * Math.PI / (360 * 60));
        this.drawHand(ctx, this.hour, radius * 0.4, radius * 0.07, radius);
        //minute
        this.minute = (this.minute * Math.PI / 30) + (this.second * Math.PI / (30 * 60));
        this.drawHand(ctx, this.minute, radius * 0.65, radius * 0.07, radius);
        // second
        this.second = (this.second * Math.PI / 30);
        this.drawHand(ctx, this.second, radius * 0.7, radius * 0.03, radius, 1);
    }

    drawHand(ctx, pos, length, width, radius, second = 0) {
        if (second > 0 ){
            ctx.fillStyle = "#da0500";
            ctx.strokeStyle = "#da0500";
            ctx.beginPath();
            ctx.arc(0, 0, radius * 0.05, 0, 2 * Math.PI);
            ctx.fillStyle = '#da0500';
            ctx.fill();
        } else {
            ctx.fillStyle = "#000000";
            ctx.strokeStyle = "#000000";
        }

        ctx.beginPath();
        ctx.lineWidth = width;
        //ctx.lineCap = "round";
        ctx.moveTo(0, 0);
        ctx.rotate(pos);
        ctx.lineTo(0, -length);
        ctx.stroke();
        ctx.rotate(-pos);
    }

    drawLines(ctx){
        ctx.beginPath();
        ctx.fillStyle = "#9d9d9d";
        ctx.strokeStyle = "#9d9d9d";
        for (let i = 0; i < 12; i++) {
            ctx.rotate(Math.PI/6);
            ctx.lineWidth = 4;
            ctx.moveTo(68,0);
            ctx.lineTo(78,0);
        }
        ctx.stroke(); // Нарисовали то, что ранее описали
        ctx.restore(); // Достаем последний сохраненный контекст из стэка
    }

}