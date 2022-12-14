/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


const PIXEL_RATIO = (function () {
    let ctx = document.createElement("canvas").getContext("2d"),
        dpr = window.devicePixelRatio || 1,
        bsr = ctx.webkitBackingStorePixelRatio ||
            ctx.mozBackingStorePixelRatio ||
            ctx.msBackingStorePixelRatio ||
            ctx.oBackingStorePixelRatio ||
            ctx.backingStorePixelRatio || 1;

    return dpr / bsr;
})();

const Gravity = {
    LEFT: "left",
    RIGHT: "right",
    CENTER: "center"
};

const CssSizeUnits = {
    EM: "em",
    PT: "pt",
    PX: "px"
};

const FontStyle = {
    REGULAR: "normal",
    BOLD: "bold",
    ITALIC: "italic",
    BOLD_ITALIC: "italic bold"
};

/**
 * 
 * @param {Array} xpoints
 * @param {Array} ypoints
 * @param {Number} npoints
 * @returns {Polygon}
 */
function Polygon(xpoints, ypoints, npoints) {

    this.bounds = new Rectangle();
    if (xpoints && ypoints && xpoints.length !== ypoints.length) {
        logger('xpoints and ypoints must have the same size.');
        return;
    }

    if (Object.prototype.toString.call(xpoints) !== '[object Array]') {
        logger('xpoints must be an array of integer numbers');
        this.xpoints = [];
    } else {
        this.xpoints = xpoints;
    }
    if (Object.prototype.toString.call(ypoints) !== '[object Array]') {
        logger('ypoints must be an array of integer numbers');
        this.ypoints = [];
    } else {
        this.ypoints = ypoints;
    }
    if (typeof npoints !== 'number') {
        logger('npoints must be an integer number');
        npoints = this.xpoints.length;
    } else {
        this.npoints = npoints;
    }
}

/**
 * 
 * @param {Number} x The x coordinate of the Point
 * @param {Number} y The y coordinate of the Point
 * @returns {undefined}
 */
Polygon.prototype.addPoint = function (x, y) {
    if (typeof x !== 'number') {
        logger('x must be an integer number');
        return;
    }
    if (typeof y !== 'number') {
        logger('y must be an integer number');
        return;
    }
    this.xpoints.push(x);
    this.ypoints.push(y);

    this.npoints += 1;
};

/**
 * Add an array of points to the Polygon
 * @param {Array} xpts The array of x points
 * @param {Array} ypts The array of y points
 * @returns {undefined}
 */
Polygon.prototype.addPoints = function (xpts, ypts) {
    if (Object.prototype.toString.call(xpts) !== '[object Array]') {
        logger('xpts must be an array of integer numbers');
        return;
    }
    if (Object.prototype.toString.call(ypts) !== '[object Array]') {
        logger('ypts must be an array of integer numbers');
        return;
    }

    if (xpts.length === ypts.length) {
        Array.prototype.push.apply(this.xpoints, xpts);
        Array.prototype.push.apply(this.ypoints, ypts);
        this.npoints += xpts.length;
    } else {
        logger('xpts and ypts must have the same length');
    }

};


/**
 * 
 * @param {Number} x The x coordinate of a point
 * @param {Number} y The y coordinate of a point
 * @returns {Number|Boolean}
 */
Polygon.prototype.contains = function (x, y) {
    if (this.npoints <= 2 || !this.getBoundingBox().contains(x, y)) {
        return false;
    }
    var hits = 0;

    var lastx = xpoints[npoints - 1];
    var lasty = ypoints[npoints - 1];
    var curx, cury;

    // Walk the edges of the polygon
    for (var i = 0; i < npoints; i++) {
        curx = xpoints[i];
        cury = ypoints[i];

        if (cury === lasty) {
            continue;
        }

        var leftx;
        if (curx < lastx) {
            if (x >= lastx) {
                continue;
            }
            leftx = curx;
        } else {
            if (x >= curx) {
                continue;
            }
            leftx = lastx;
        }

        var test1, test2;
        if (cury < lasty) {
            if (y < cury || y >= lasty) {
                continue;
            }
            if (x < leftx) {
                hits++;
                continue;
            }
            test1 = x - curx;
            test2 = y - cury;
        } else {
            if (y < lasty || y >= cury) {
                continue;
            }
            if (x < leftx) {
                hits++;
                continue;
            }
            test1 = x - lastx;
            test2 = y - lasty;
        }

        if (test1 < (test2 / (lasty - cury) * (lastx - curx))) {
            hits++;
        }
    }
    lastx = curx;
    lasty = cury;
    return ((hits & 1) !== 0);
};

Polygon.prototype.getBoundingBox = function () {
    if (this.npoints === 0) {
        return new Rectangle();
    }
    if (bounds === null) {
        this.calculateBounds(this.xpoints, this.ypoints, this.npoints);
    }
    return this.bounds.getBounds();
};

/*
 * Calculates the bounding box of the points passed to the constructor.
 * Sets {@code bounds} to the result.
 * @param {Array} xpts array of <i>x</i> coordinates
 * @param {Array} ypts array of <i>y</i> coordinates
 * @param {Number} npoints the total number of points
 */
Polygon.prototype.calculateBounds = function (xpts, ypts, npts) {
    if (Object.prototype.toString.call(xpts) !== '[object Array]') {
        logger('xpts must be an array of integer numbers');
        return;
    }
    if (Object.prototype.toString.call(ypts) !== '[object Array]') {
        logger('ypts must be an array of integer numbers');
        return;
    }
    if (typeof npts !== 'number') {
        logger('npts must be an integer number');
    }
    var boundsMinX = Number.MAX_VALUE;
    var boundsMinY = Number.MAX_VALUE;
    var boundsMaxX = Number.MIN_VALUE;
    var boundsMaxY = Number.MIN_VALUE;

    for (var i = 0; i < npoints; i++) {
        var x = xpts[i];
        boundsMinX = Math.min(boundsMinX, x);
        boundsMaxX = Math.max(boundsMaxX, x);
        var y = ypts[i];
        boundsMinY = Math.min(boundsMinY, y);
        boundsMaxY = Math.max(boundsMaxY, y);
    }
    this.bounds = new Rectangle(boundsMinX, boundsMinY,
            boundsMaxX,
            boundsMaxY);
};

/*
 * Resizes the bounding box to accommodate the specified coordinates.
 * @param x,&nbsp;y the specified coordinates
 */
Polygon.prototype.updateBounds = function (x, y) {
    if (x < this.bounds.x) {
        this.bounds.width = this.bounds.width + (this.bounds.x - x);
        this.bounds.x = x;
    } else {
        this.bounds.width = Math.max(this.bounds.width, x - this.bounds.x);
    }

    if (y < this.bounds.y) {
        this.bounds.height = this.bounds.height + (this.bounds.y - y);
        this.bounds.y = y;
    } else {
        this.bounds.height = Math.max(this.bounds.height, y - this.bounds.y);
    }
};





////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * 
 * @param {string} style
 * @param {Number} size
 * @param {string} name
 * @param {Object} sizeUnits
 * @returns {Font}
 */
function Font(style, size, name, sizeUnits) {
    this.style = style;
    this.size = size;
    this.name = name;

    if (typeof sizeUnits === 'undefined') {
        this.sizeUnits = CssSizeUnits.EM;
    } else {
        this.sizeUnits = sizeUnits;
    }
}

Font.prototype.string = function () {
    return this.style + ' ' + this.size * PIXEL_RATIO + this.sizeUnits + ' ' + this.name;
};

Font.prototype.getSize = function () {
    return this.size;
};

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


createHiDPICanvas = function(canvas , w, h, ratio) {
    if (!ratio) { ratio = PIXEL_RATIO; }
    canvas.width = w * ratio;
    canvas.height = h * ratio;
    canvas.style.width = w + "px";
    canvas.style.height = h + "px";
    canvas.getContext("2d").setTransform(ratio, 0, 0, ratio, 0, 0);
    return canvas;
};

function Graphics(canvas) {

    let dpr = PIXEL_RATIO;

    //canvas = createHiDPICanvas(canvas , canvas.offsetWidth , canvas.offsetHeight, scaleFactor );
    this.ctx = canvas.getContext('2d');


    codeForScale:{
        // Get the size of the canvas in CSS pixels.
        let canvasRect = canvas.getBoundingClientRect();

        // Give the canvas pixel dimensions of their CSS
        // size * the device pixel ratio.
        canvas.width = canvasRect.width * dpr;
        canvas.height = canvasRect.height * dpr;


        // Scale all drawing operations by the dpr, so you
        // don't have to worry about the difference.
        this.ctx.scale(1, 1);

        canvas.style.width = canvasRect.width + 'px';
        canvas.style.height = canvasRect.height + 'px';

    }



    this.ctx.strokeStyle = "#000";
    this.ctx.lineWidth = 1;
    this.ctx.globalAlpha = 1.0;
    this.ctx.fillStyle = "#FFF";
    this.ctx.font = "bold 0.9em Arial";

//canvas = createHiDPICanvas(canvas , canvas.offsetWidth , canvas.offsetHeight, 1 );

    this.width = canvas.width;
    this.height = canvas.height;
}

Graphics.prototype.clear = function () {
    // clear canvas
    this.ctx.clearRect(0, 0, this.width, this.height);
};

/**
 * Changes may occur to the canvas, such as stretching due to changing the css width or height(e.g when the screen is resized or rotated)
 * Call this method to force the Graphics object to scale with the dimensions of the canvas accordingly
 * @param canvas
 */
Graphics.prototype.reloadCanvas = function (canvas){
    const dpr = PIXEL_RATIO;


    {
        // Get the size of the canvas in CSS pixels.
        let canvasRect = canvas.getBoundingClientRect();

        // Give the canvas pixel dimensions of their CSS
        // size * the device pixel ratio.
        canvas.width = canvasRect.width * dpr;
        canvas.height = canvasRect.height * dpr;


        // Scale all drawing operations by the dpr, so you
        // don't have to worry about the difference. Nah!!!
        this.ctx.scale(1, 1);

        canvas.style.width = canvasRect.width + 'px';
        canvas.style.height = canvasRect.height + 'px';

    }

    this.width = canvas.width;
    this.height = canvas.height;
};
 

Graphics.prototype.scale = function (w , h){
    this.ctx.scale(w , h);
};


/**
 * 
 * @param {Font} font
 * @returns {undefined}
 */
Graphics.prototype.setFont = function (font) {
    if (font.constructor.name === 'Font') {
        this.ctx.font = font.string();
    }
};

/**
 * 
 * @param {string} color
 * @returns {undefined}
 */
Graphics.prototype.setColor = function (color) {
    if (typeof color === 'string') {
        this.ctx.strokeStyle = color;
    }
};

/**
 * 
 * @param {string} bg
 * @returns {undefined}
 */
Graphics.prototype.setBackground = function (bg) {
    if (typeof bg === 'string') {
        this.ctx.fillStyle = bg;
    }
};

/**
 * 
 * @param {Number} strokeWidth
 * @returns {undefined}
 */
Graphics.prototype.setStrokeWidth = function (strokeWidth) {
    if (typeof strokeWidth === 'number') {
        this.ctx.lineWidth = strokeWidth;
    }
};
/**
 * 
 * @returns {Number} strokeWidth
 */
Graphics.prototype.getStrokeWidth = function () {
    return this.ctx.lineWidth;
};
/**
 * 
 * @param {Number} alpha A number between 0 and 1
 * @returns {undefined}
 */
Graphics.prototype.setAlpha = function (alpha) {
    if (typeof alpha === 'number') {
        this.ctx.globalAlpha = alpha;
    }
};

/**
 * ctx.lineJoin = "bevel" || "round" || "miter";
 * @param {string} lineJoinStyle
 * @returns {undefined}
 */
Graphics.prototype.lineJoinStyle = function (lineJoinStyle) {
    if (typeof lineJoinStyle === 'string') {
        this.ctx.lineJoin = lineJoinStyle;
    }
};

/**
 * ctx.lineCap = "butt" || "round" || "square";
 * @param {string} lineCapStyle
 * @returns {undefined}
 */
Graphics.prototype.lineCapStyle = function (lineCapStyle) {
    if (typeof lineCapStyle === 'string') {
        this.ctx.lineCap = lineCapStyle;
    }
};

Graphics.prototype.normalizeQuantity = function (qty){
    if(typeof qty === 'number'){
        return qty * PIXEL_RATIO;
    }
    throw new Error("Only numbers can be normalized")
};


/**
 * Draws a rectangular shape's outline
 * @param {number} x The left coordinates of the rectangle
 * @param {number} y The right top coordinates of the rectangle
 * @param {number} width The width of the rectangle
 * @param {number} height The height of the rectangle
 * @returns {undefined}
 */
Graphics.prototype.drawRect = function (x, y, width, height) {

    if (typeof x === 'number' && typeof y === 'number' && typeof width === 'number' && typeof height === 'number') {

        this.ctx.strokeRect(x,y, PIXEL_RATIO * width, PIXEL_RATIO * height);
    }
};


/**
 * Fills a rectangular shape with color
 * @param {number} x The left coordinates of the rectangle
 * @param {number} y The right top coordinates of the rectangle
 * @param {number} width The width of the rectangle
 * @param {number} height The height of the rectangle
 * @returns {undefined}
 */
Graphics.prototype.fillRect = function (x, y, width, height) {
    if (typeof x === 'number' && typeof y === 'number' && typeof width === 'number' && typeof height === 'number') {

        this.ctx.fillRect(x, y, PIXEL_RATIO * width, PIXEL_RATIO * height);
    }
};


/**
 * Draws a rectangular shape's outline
 * @param {number} x The left coordinates of the rectangle
 * @param {number} y The right top coordinates of the rectangle
 * @param {number} width The width of the rectangle
 * @param {number} height The height of the rectangle
 * @param {number} radius The radius of the rectangle
 * @returns {undefined}
 */
Graphics.prototype.drawPoint = function (x, y) {
    if (typeof x === 'number' && typeof y === 'number') {

        this.ctx.beginPath();
        this.ctx.moveTo(x , y);
        this.ctx.lineTo(x+0.1,y);
        this.ctx.closePath();
        this.ctx.stroke();
    }
};

Graphics.prototype.beginPath = function () {
    this.ctx.beginPath();
};
/**
 *
 * @param x
 * @param y
 */
Graphics.prototype.moveTo = function (x , y) {
    if (typeof x === 'number' && typeof y === 'number') {
        this.ctx.moveTo(x,y);
    }
};

/**
 *
 * @param x
 * @param y
 */
Graphics.prototype.lineTo = function (x , y) {
    if (typeof x === 'number' && typeof y === 'number') {
        this.ctx.lineTo(x,y);
    }
};


/**
 *
 */
Graphics.prototype.closePath = function () {
        this.ctx.closePath();
};

Graphics.prototype.stroke = function () {
        this.ctx.stroke();
};

Graphics.prototype.fill = function () {
        this.ctx.fill();
};

/**
 * Draws a rectangular shape's outline
 * @param {number} x The left coordinates of the rectangle
 * @param {number} y The right top coordinates of the rectangle
 * @param {number} width The width of the rectangle
 * @param {number} height The height of the rectangle
 * @param {number} radius The radius of the rectangle
 * @returns {undefined}
 */
Graphics.prototype.drawRoundRect = function (x, y, width, height, radius) {
    if (typeof x === 'number' && typeof y === 'number' && typeof width === 'number' && typeof height === 'number' && typeof radius === 'number') {

        if (typeof radius === 'undefined') {
            radius = 5;
        }
        if (typeof radius === 'number') {
            radius = {tl: radius, tr: radius, br: radius, bl: radius};
        } else {
            var defaultRadius = {tl: 0, tr: 0, br: 0, bl: 0};
            for (var side in defaultRadius) {
                radius[side] = radius[side] || defaultRadius[side];
            }
        }

          this.ctx.beginPath();
         this.ctx.moveTo(x + radius.tl, y);
         this.ctx.lineTo(x + width - radius.tr, y);
         this.ctx.quadraticCurveTo(x + width , y, x + width, y + radius.tr);
         this.ctx.lineTo(x + width, y + height - radius.br);
         this.ctx.quadraticCurveTo(x + width, y + height, x + width - radius.br, y + height);
         this.ctx.lineTo(x + radius.bl, y + height);
         this.ctx.quadraticCurveTo(x, y + height, x, y + height - radius.bl);
         this.ctx.lineTo(x, y + radius.tl);
         this.ctx.quadraticCurveTo(x, y, x + radius.tl, y);
         this.ctx.closePath();


         this.ctx.stroke();


    }
};



/**
 * Fills a rectangular shape's outline
 * @param {number} x The left coordinates of the rectangle
 * @param {number} y The right top coordinates of the rectangle
 * @param {number} width The width of the rectangle
 * @param {number} height The height of the rectangle
 * @param {number} radius The radius of the rectangle
 * @returns {undefined}
 */
Graphics.prototype.fillRoundRect = function (x, y, width, height, radius) {
    if (typeof x === 'number' && typeof y === 'number' && typeof width === 'number' && typeof height === 'number' && typeof radius === 'number') {

        if (typeof stroke === 'undefined') {
            stroke = true;
        }
        if (typeof radius === 'undefined') {
            radius = 5;
        }
        if (typeof radius === 'number') {
            radius = {tl: radius, tr: radius, br: radius, bl: radius};
        } else {
            var defaultRadius = {tl: 0, tr: 0, br: 0, bl: 0};
            for (var side in defaultRadius) {
                radius[side] = radius[side] || defaultRadius[side];
            }
        }
        this.ctx.beginPath();
        this.ctx.moveTo(x + radius.tl, y);
        this.ctx.lineTo(x + width - radius.tr, y);
        this.ctx.quadraticCurveTo(x + width, y, x + width, y + radius.tr);
        this.ctx.lineTo(x + width, y + height - radius.br);
        this.ctx.quadraticCurveTo(x + width, y + height, x + width - radius.br, y + height);
        this.ctx.lineTo(x + radius.bl, y + height);
        this.ctx.quadraticCurveTo(x, y + height, x, y + height - radius.bl);
        this.ctx.lineTo(x, y + radius.tl);
        this.ctx.quadraticCurveTo(x, y, x + radius.tl, y);
        this.ctx.closePath();
        this.ctx.fill();



    }
};


/**
 * Draws an ellipse
 * @param {Number} cenX The x-center of the ellipse
 * @param {Number} cenY The y-center of the ellipse
 * @param {Number} radX The ellipse's major-axis radius. Must be non-negative.
 * @param {Number} radY The ellipse's minor-axis radius. Must be non-negative.
 * @param {Number} rotation The rotation of the ellipse, expressed in radians.
 * @param {Number} startAngle The angle at which the ellipse starts, measured clockwise from the positive x-axis and expressed in radians.
 * @param {Number} endAngle The angle at which the ellipse ends, measured clockwise from the positive x-axis and expressed in radians.
 * @param {boolean} counterclockwise An optional Boolean which, if true, draws the ellipse counterclockwise (anticlockwise). The default value is false (clockwise).
 * @returns {undefined}
 */
Graphics.prototype.drawEllipse = function (cenX, cenY, radX, radY, rotation, startAngle, endAngle, counterclockwise) {
    if (typeof cenX === 'number' && typeof cenY === 'number' && typeof radX === 'number' && typeof radY === 'number' &&
            typeof rotation === 'number' && typeof startAngle === 'number' && typeof endAngle === 'number' && typeof counterclockwise === 'boolean') {

        this.ctx.beginPath();
        this.ctx.ellipse(cenX, cenY, radX, radY, rotation, startAngle, endAngle, counterclockwise);
        this.ctx.closePath();
        this.ctx.stroke();
    }
};

/**
 * Fills an ellipse
 * @param {Number} cenX The x-center of the ellipse
 * @param {Number} cenY The y-center of the ellipse
 * @param {Number} radX The ellipse's major-axis radius. Must be non-negative.
 * @param {Number} radY The ellipse's minor-axis radius. Must be non-negative.
 * @param {Number} rotation The rotation of the ellipse, expressed in radians.
 * @param {Number} startAngle The angle at which the ellipse starts, measured clockwise from the positive x-axis and expressed in radians.
 * @param {Number} endAngle The angle at which the ellipse ends, measured clockwise from the positive x-axis and expressed in radians.
 * @param {boolean} counterclockwise An optional Boolean which, if true, draws the ellipse counterclockwise (anticlockwise). The default value is false (clockwise).
 * @returns {undefined}
 */
Graphics.prototype.fillEllipse = function (cenX, cenY, radX, radY, rotation, startAngle, endAngle, counterclockwise) {
    if (typeof cenX === 'number' && typeof cenY === 'number' && typeof radX === 'number' && typeof radY === 'number' &&
            typeof rotation === 'number' && typeof startAngle === 'number' && typeof endAngle === 'number' && typeof counterclockwise === 'boolean') {

        this.ctx.beginPath();
        this.ctx.ellipse(cenX, cenY, radX, radY, rotation, startAngle, endAngle, counterclockwise);
        this.ctx.closePath();
        this.ctx.fill();
    }
};



/**
 * Same as drawEllipse, but with less options
 * @param {Number} cenX The x-center of the ellipse
 * @param {Number} cenY The y-center of the ellipse
 * @param {Number} radX The ellipse's major-axis radius. Must be non-negative.
 * @param {Number} radY The ellipse's minor-axis radius. Must be non-negative.
 * @returns {undefined}
 */
Graphics.prototype.drawOval = function (cenX, cenY, radX, radY) {
    if (typeof cenX === 'number' && typeof cenY === 'number' && typeof radX === 'number' && typeof radY === 'number') {

        this.ctx.beginPath();
        this.ctx.ellipse(cenX, cenY, radX, radY, 0, 0, 2 * Math.PI, false);
        this.ctx.closePath();
        this.ctx.stroke();
    }
};

/**
 * Same as fillEllipse, but with less options
 * @param {Number} cenX The x-center of the ellipse
 * @param {Number} cenY The y-center of the ellipse
 * @param {Number} radX The ellipse's major-axis radius. Must be non-negative.
 * @param {Number} radY The ellipse's minor-axis radius. Must be non-negative.
 * @returns {undefined}
 */
Graphics.prototype.fillOval = function (cenX, cenY, radX, radY) {
    if (typeof cenX === 'number' && typeof cenY === 'number' && typeof radX === 'number' && typeof radY === 'number') {

        this.ctx.beginPath();
        this.ctx.ellipse(cenX, cenY, radX, radY, 0, 0, 2 * Math.PI, false);
        this.ctx.closePath();
        this.ctx.fill();

    }
};

/**
 * Draws a circle
 * @param {Number} cenX The x center  of the circle
 * @param {Number} cenY The y center  of the circle
 * @param {Number} radius The radius of the circle
 * @returns {undefined}
 */
Graphics.prototype.drawCircle = function (cenX, cenY, radius) {
    if (typeof cenX === 'number' && typeof cenY === 'number' && typeof radius === 'number') {
        this.drawOval(cenX, cenY, radius, radius);
    }
};


/**
 * Fills a circle
 * @param {Number} cenX The x center  of the circle
 * @param {Number} cenY The y center  of the circle
 * @param {Number} radius The radius of the circle
 * @returns {undefined}
 */
Graphics.prototype.fillCircle = function (cenX, cenY, radius) {
    if (typeof cenX === 'number' && typeof cenY === 'number' && typeof radius === 'number') {
        this.fillOval(cenX, cenY, radius, radius);
    }
};

Graphics.prototype.drawArc = function (cenX, cenY, radius, startAngle, endAngle, counterclockwise) {
    if (typeof cenX === 'number' && typeof cenY === 'number' && typeof radius === 'number' &&
            typeof startAngle === 'number' && typeof endAngle === 'number' && typeof counterclockwise === 'boolean') {

        this.ctx.beginPath();
        this.ctx.arc(cenX, cenY, radius, startAngle, endAngle, counterclockwise);
        this.ctx.stroke();
    }
};


/**
 * Draws a line between the 2 points
 * @param {Number} x1 The x coordinate of the first point
 * @param {Number} y1 The y coordinate of the first point
 * @param {Number} x2 The x coordinate of the second point
 * @param {Number} y2 The x coordinate of the seond point
 * @returns {undefined}
 */
Graphics.prototype.drawLine = function (x1, y1, x2, y2) {
    if (typeof x1 === 'number' && typeof y1 === 'number' && typeof x2 === 'number' && typeof y2 === 'number') {


        this.ctx.beginPath();
        this.ctx.moveTo(x1, y1);
        this.ctx.lineTo(x2, y2);
        this.ctx.stroke();
    }
};

/**
 * Draw a polygon
 * @param {Polygon} polygon
 * @returns {undefined}
 */
Graphics.prototype.drawPolygon = function (polygon) {
    if (polygon.constructor.name === 'Polygon') {

        var x = 0;
        var y = 0;
        this.ctx.beginPath();
        for (var i = 0; i < polygon.xpoints.length; i++) {
            x = polygon.xpoints[i];
            y = polygon.ypoints[i];
            if (i === 0) {
                this.ctx.moveTo(x, y);
            } else {
                this.ctx.lineTo(x, y);
            }
        }
        this.ctx.lineTo(x, y);
        this.ctx.stroke();
    }
};


Graphics.prototype.drawPolygon = function (polygon) {
    if (polygon.constructor.name === 'Polygon') {
        var x = 0;
        var y = 0;
        this.ctx.beginPath();
        for (var i = 0; i < polygon.xpoints.length; i++) {
            x = polygon.xpoints[i];
            y = polygon.ypoints[i];
            if (i === 0) {
                this.ctx.moveTo(x, y);
            } else {
                this.ctx.lineTo(x, y);
            }
        }
        this.ctx.lineTo(x, y);
        this.ctx.stroke();
    }
};

/**
 * Fills a polygon
 * @param {Polygon} polygon
 * @returns {undefined}
 */
Graphics.prototype.save = function () {
        this.ctx.save();
};



/**
 * Draws a polygon given its vertices and its vertex count
 * @param {type} xpoints An array of x coordinates in the polygon
 * @param {type} ypoints An array of y coordinates in the polygon
 * @param {type} npoints The number of items in x and y: must be same
 * @returns {undefined}
 */
Graphics.prototype.drawPolygonFromVertices = function (xpoints, ypoints, npoints) {
    if (Object.prototype.toString.call(xpoints) !== '[object Array]') {
        logger('xpoints must be an array of integer numbers');
        return;
    }
    if (Object.prototype.toString.call(ypoints) !== '[object Array]') {
        logger('ypoints must be an array of integer numbers');
        return;
    }
    if (typeof npoints !== 'number') {
        logger('npoints must be an integer number');
        return;
    }
    if (xpoints.length !== ypoints.length) {
        logger('xpoints and ypoints must have the same size.');
        return;
    }
    var x = 0;
    var y = 0;
    this.ctx.beginPath();
    for (var i = 0; i < xpoints.length; i++) {
        var x = xpoints[i];
        var y = ypoints[i];
        if (i === 0) {
            this.ctx.moveTo(x, y);
        } else {
            this.ctx.lineTo(x, y);
        }
    }
    this.ctx.lineTo(x, y);
    this.ctx.stroke();

};


/**
 * Fills a polygon given its vertices and its vertex count
 * @param {type} xpoints An array of x coordinates in the polygon
 * @param {type} ypoints An array of y coordinates in the polygon
 * @param {type} npoints The number of items in x and y: must be same
 * @returns {undefined}
 */
Graphics.prototype.fillPolygonFromVertices = function (xpoints, ypoints, npoints) {
    if (Object.prototype.toString.call(xpoints) !== '[object Array]') {
        logger('xpoints must be an array of integer numbers');
        return;
    }
    if (Object.prototype.toString.call(ypoints) !== '[object Array]') {
        logger('ypoints must be an array of integer numbers');
        return;
    }
    if (typeof npoints !== 'number') {
        logger('npoints must be an integer number');
        return;
    }
    if (xpoints.length !== ypoints.length) {
        logger('xpoints and ypoints must have the same size.');
        return;
    }
    var x = 0;
    var y = 0;
    this.ctx.beginPath();
    for (var i = 0; i < xpoints.length; i++) {
        var x = xpoints[i];
        var y = ypoints[i];
        if (i === 0) {
            this.ctx.moveTo(x, y);
        } else {
            this.ctx.lineTo(x, y);
        }
    }
    this.ctx.lineTo(x, y);
    this.fill();

};

/**
 *
 * @param {type} text The text to draw
 * @param {type} x The x coordinate of the text's location
 * @param {type} y The y coordinate of the text's location
 * @returns {undefined}
 */
Graphics.prototype.drawHollowString = function (text, x, y) {
    this.ctx.strokeText(text, x, y);
};
/**
 *
 * @param {String} text The text to draw
 * @param {Number} x The x coordinate of the text's location
 * @param {Number} y The y coordinate of the text's location
 * @returns {undefined}
 */
Graphics.prototype.drawString = function (text, x, y) {
    this.ctx.fillText(text, x, y);
};

Graphics.prototype.drawImageAt = function (image, dx, dy) {
    if(typeof dx === 'number' && typeof dy === 'number'){
        this.ctx.drawImage(image, dx, dy);
    }

};

Graphics.prototype.drawImageAtLocWithSize = function (image, dx, dy, dWidth, dHeight) {
    if (typeof dx === 'number' && typeof dy === 'number' && typeof dWidth === 'number' && typeof dHeight === 'number') {
    this.ctx.drawImage(image, dx, dy, dWidth, dHeight);
}

};


Graphics.prototype.drawImage = function (image, sx, sy, sWidth, sHeight, dx, dy, dWidth, dHeight) {
    if (typeof sx === 'number' && typeof sy === 'number' && typeof sWidth === 'number' && typeof sHeight === 'number'
        && typeof dx === 'number' && typeof dy === 'number' && typeof dWidth === 'number' && typeof dHeight === 'number') {
        this.ctx.drawImage(image, sx, sy, sWidth, sHeight, dx, dy, dWidth, dHeight);
    }

};

/**
 *
 * @param {Number} x The x location
 * @param {Number} y The y location
 * @param {Number} width The width of the area to copy
 * @param {Number} height The height of the area to copy
 * @returns {ImageData}
 */
Graphics.prototype.getImageData = function (x, y, width, height) {
    if(typeof x === "number" && typeof y === "number" && typeof width === "number" && typeof height === "number"){
        return this.ctx.getImageData(x, y, width, height);
    }

};


/**
 *
 * @param {string} text Text whose width is needed
 * @returns {number}
 */
Graphics.prototype.stringWidth = function (text) {
    if (typeof text === 'string') {
        return this.ctx.measureText(text).width;
    }
    return 0;
};


/**
 *
 * @param {String} text A number between 0 and 1
 * @returns {number}
 */
Graphics.prototype.textHeight = function (text) {
    if (typeof text === 'string') {
        return this.ctx.measureText('M').width;
    }
    return 0;
};