<style>
    .controls {
    text-align: center;
    top: 1em;
    width: 100%;
    }

    .button {
    color: #bbb;
    font-size: 1vw;
    margin: 0 0.5em;
    text-decoration: none;
    }

    .button:first-child {
        margin-left: 0;
    }

    .button:last-child {
        margin-right: 0;
    }

    .button:hover {
    color: white;
    }

    .stopwatch {
    font-size: 2vw;
    text-align: center;
    }

    .results {
    border-color: lime;
    list-style: none;
    margin: 0;
    padding: 0;
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    }
</style>

<nav id="sidebar-fixed" class="sidebar">
    <div class="sidebar-header">
        <h3>Pengerjaan Soal</h3>
    </div>

    <div id="sidebar-pretest">
    </div>

    <nav class="controls">
        Stopwatch
        <!-- <a href="#" class="button" onClick="stopwatch.stop();">Stop</a> -->
    </nav>
    <div class="stopwatch"></div>
    <ul class="results"></ul>
</nav>
<script>
    class Stopwatch {
    constructor(display, results) {
        this.running = false;
        this.display = display;
        this.results = results;
        this.laps = [];
        this.reset();
        this.print(this.times);
    }
    
    reset() {
        this.times = [ 0, 0, 0 ];
    }
    
    start() {
        if (!this.time) this.time = performance.now();
        if (!this.running) {
            this.running = true;
            requestAnimationFrame(this.step.bind(this));
        }
    }
    
    stop() {
        this.running = false;
        let times = this.times;
        // alert(times);
    }
    
    step(timestamp) {
        if (!this.running) return;
        this.calculate(timestamp);
        this.time = timestamp;
        this.print();
        requestAnimationFrame(this.step.bind(this));
    }
    
    calculate(timestamp) {
        var diff = timestamp - this.time;
        // Hundredths of a second are 100 ms
        this.times[2] += diff / 10;
        // Seconds are 100 hundredths of a second
        if (this.times[2] >= 100) {
            this.times[1] += 1;
            this.times[2] -= 100;
        }
        // Minutes are 60 seconds
        if (this.times[1] >= 60) {
            this.times[0] += 1;
            this.times[1] -= 60;
        }
    }
    
    print() {
        this.display.innerText = this.format(this.times);
    }
    
    format(times) {
        return `\
    ${pad0(times[0], 2)}:\
    ${pad0(times[1], 2)}:\
    ${pad0(Math.floor(times[2]), 2)}`;
        }
    }

    function pad0(value, count) {
        var result = value.toString();
        for (; result.length < count; --count)
            result = '0' + result;
        return result;
    }

    function clearChildren(node) {
        while (node.lastChild)
            node.removeChild(node.lastChild);
    }

    let stopwatch = new Stopwatch(
        document.querySelector('.stopwatch'),
        document.querySelector('.results')
    );
    stopwatch.start();
</script>