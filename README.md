# jQuery Countdown

WP jQuery Countdown is a fork of [jQuery Countdown](https://github.com/Reflejo/jquery-countdown) which allows the plugin to be used as a WP shortcode.

Use `[wp_jquery_countdown endtime="15:00"]` to count down from 15 minutes.

jQuery Countdown is a countdown library with an amazing animation. Take a look at the [demonstration](http://reflejo.github.com/jquery-countdown/).

Download the PSD file [here](https://github.com/Reflejo/jquery-countdown/blob/master/img/digits.psd).

------

#jQuery Plugin Documentation

### Basic usage:

```javascript
  $('#counter').countdown({startTime: "01:12:32:55"});
```

### Complete usage:

```javascript
  $('#counter').countdown({
    stepTime: 60,
    format: 'hh:mm:ss',
    startTime: "12:32:55",
    digitImages: 6,
    digitWidth: 53,
    digitHeight: 77,
    timerEnd: function() { alert('end!!'); },
    image: "digits.png"
  });
```

### Added continuous countdown

```javascript
  $('#counter').countdown({
    format: 'sss',
    startTime: "120",
    continuous: true,
    timerEnd: function() { alert('end!!'); },
    image: "digits.png"
  });
```

### Countdown to a Date

Relative to current hour:

```javascript
  $('#counter').countdown({
    image: "digits.png",
    format: "mm:ss",
    endTime: '50:00'
  });
```

An absolute date:


```javascript
  $('#counter').countdown({
    image: "digits.png",
    format: "mm:ss",
    endTime: new Date('07/16/13 05:00:00')
  });
```

Did I mention that js code weighs just **2.8 KB**?

### Developers

- Martín Conte Mac Donell - <Reflejo@gmail.com> - [@fz](https://twitter.com/fz)
- [Matt Neary](http://mattneary.com) - <neary.matt@gmail.com>

### Demo

Look at the [demo](http://reflejo.github.com/jquery-countdown/).

