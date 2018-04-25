:warning: This repository is archived and exists only for historical purposes :warning:

Leftronic API Documentation
===========================

What is Leftronic?
------------------

[Leftronic](https://www.leftronic.com) makes powerful dashboards for business intelligence.

* Colorful and interactive data visualizations
* Templates to get you started right away
* Drag-and-drop editor makes it easy for anyone to create a powerful dashboard, customized to their needs
* Integration with Google Analytics, Twitter, Chartbeat, Zendesk, Basecamp, Pivotal Tracker, Facebook, and more to come!
* Dashboards can be protected or shared with a shortened URL
* Powerful API's for Javascript, PHP, Python, Ruby, and Java
* Python Package and Ruby Gem

Technical Notes
---------------

We also suggest checking out our [API](https://www.leftronic.com/api) page. While the most detailed documentation is here, it has JSON and CURL examples in addition to a test form to send data to your custom widgets.

Authentication is handled by your API access key. We strongly encourage you to keep this key private. If you're logged in, your key can be found on our [API](https://www.leftronic.com/api) page. If you plan on using one of our API libraries, you will find instructions below on how to set your access key.

All API requests are made by sending a POST request to https://www.leftronic.com/customSend/ with a properly formatted JSON packet. We do not support XML.

Current API version is 1.0.

Getting Started
---------------

If you haven't already, create an account at https://www.leftronic.com/accounts/login.

Get your API access key from the API overview page at https://www.leftronic.com/api.

We recommend checking out our [Tutorials](https://www.leftronic.com/tutorials) to familiarize yourself with your dashboard.

Javascript
----------

*Note*: Because Javascript is rendered by the browser, your API access key will be clearly visible in plain text. We recommend using our PHP, Python, or Ruby API libraries. If you need to use the Javascript API and have concerns about abuse or misuse of your private key, please feel free to send us an email at <support@leftronic.com>.

Start by downloading the most recent version of our Javascript API at https://github.com/leftronic/leftronic/blob/master/javascript/leftronic.js.


### Dependencies

This library uses [jQuery](http://jquery.com) for POST requests. Either [download jQuery](http://jquery.com/download) or look at [instructions](http://code.google.com/apis/libraries/devguide.html#jquery) to load from Google's CDN.

```javascript
<script type="text/javascript" src="your/path/jquery.min.js"></script>
```

Edit the file, adding your API key here:

```javascript
var accessKey = "YOUR_ACCESS_KEY";
```

Add the file to the header of your web pages with the appropriate path linking to the location of your file:

```javascript
<script type="text/javascript" src="your/path/leftronic.js"></script>
```

Here are some example functions to push to your dashboard. Be sure you have configured the correct widgets to accept custom data points. Also, be sure that you have entered your API access key correctly.

Let's start with pushing a number to a widget.

```javascript
pushNumber("yourNumberStream", 14600);
```

Now we'll push some geographic coordinates to a map widget. You can use either the U.S. or world map widgets. The first coordinate (37.8) is the latitude and the second coordinate (-122.6) is the longitude. If your request is successful, you should see a data point appear on San Francisco, California. Optionally, if you'd like to set the color of your map point simply specify that in your function call. *Note*: only red, blue, green, purple, and yellow colors are supported at this time. Incorrect or missing color will default to red.

```javascript
pushGeo("yourGeoStream", 37.8, -122.6);
```

```javascript
pushGeo("yourGeoStream", 37.8, -122.6, "blue");
```

Here's how you push a title and message to a text feed widget.

```javascript
pushText("yourTextStream", "This is my title.", "Hello World!");
```

Let's push an array of names and values to a leaderboard widget. Be sure to create the array first (you may call it whatever you'd like). Be careful to use the proper syntax. Next, push the array to your widget.

```javascript
var leaderArray = [{"name": "Johnny", "value": 84}, {"name": "Jamie", "value": 75}, {"name": "Lance", "value": 62}];

pushLeaderboard("yourBoardStream", leaderArray);
```

Similar to the last example, let's push a list of items to a list widget. Same rules as last time.

```javascript
var listArray = [{"listItem": "Elizabeth"}, {"listItem": "Marshall"}, {"listItem": "Claire"}, {"listItem": "Nolan"}];

pushList("yourListStream", listArray);
```

PHP
---

Start by downloading the most recent version of our PHP API at https://github.com/leftronic/leftronic/blob/master/php/leftronic.php. You only need `leftronic.php` and the `CAcerts` folder; the `test.html` and `pushNumber.php` are very simple integration examples.

### Dependencies

This API library uses "json_encode()" which requires [PHP](http://php.net/downloads.php) 5.2.0 or greater. Please also make sure to have the `CAcerts` folder in the same path as your leftronic.php file.

Create a class instance with your API key. Feel free to name it whatever you'd like.

```php
$update = new Leftronic("YOUR_ACCESS_KEY");
```

Here are some example functions to push to your dashboard. Be sure you have configured the correct widgets to accept custom data points. Also, be sure that you have entered your API access key correctly.

Let's start with pushing a number to a widget.

```php
$update->pushNumber("yourNumberStream", 14600);
```

Now we'll push some geographic coordinates to a map widget. You can use either the U.S. or world map widgets. The first coordinate (37.8) is the latitude and the second coordinate (-122.6) is the longitude. If your request is successful, you should see a data point appear on San Francisco, California. Optionally, if you'd like to set the color of your map point simply specify that in your function call. *Note*: only red, blue, green, purple, and yellow colors are supported at this time. Incorrect or missing color will default to red.

```php
$update->pushGeo("yourGeoStream", 37.8, -122.6);
```

```php
$update->pushGeo("yourGeoStream", 37.8, -122.6, "blue");
```

Here's how you push a title and message to a text feed widget.

```php
$update->pushText("yourTextStream", "This is my title.", "Hello World!");
```

Let's push an array of names and values to a leaderboard widget. Be sure to create the array first (you may call it whatever you'd like). Be careful to use the proper syntax. Next, push the array to your widget.

```php
$leaderArray = array(array("name" => "Johnny", "value" => 84), array("name" => "Jamie", "value" => 75), array("name" => "Lance", "value" => 62));

$update->pushLeaderboard("yourBoardStream", $leaderArray);
```

Similar to the last example, let's push a list of items to a list widget. Same rules as last time.

```php
$listArray = array(array("listItem" => "Elizabeth"), array("listItem" => "Marshall"), array("listItem" => "Claire"), array("listItem" => "Nolan"));

$update->pushList("yourListStream", $listArray);
```

Python
------

**_Note_**: We also have a Leftronic Python Package that offers the same functionality. You can download it on [Github](https://github.com/leftronic/leftronic-python) or on the [Python Package Index](http://pypi.python.org/pypi/leftronic).

Start by downloading the most recent version of our Python API at https://github.com/leftronic/leftronic/blob/master/python/leftronic.py.

### Dependencies

[urllib2](http://docs.python.org/library/urllib2.html) and [JSON](http://docs.python.org/library/json.html).

```python
import urllib2
import json
```

Import the file. Your location may vary.

```python
from leftronic import Leftronic
```

Create a class instance with your API key. Feel free to name it whatever you'd like.

```python
update = Leftronic("YOUR_ACCESS_KEY")
```

Here are some example functions to push to your dashboard. Be sure you have configured the correct widgets to accept custom data points. Also, be sure that you have entered your API access key correctly.

Let's start with pushing a number to a widget.

```python
update.pushNumber("yourNumberStream", 14600)
```

You can also push in a suffix or prefix for a number as follows:

```python
update.pushNumber("yourNumberStream", {"prefix": "$", "number": 4})
update.pushNumber("yourNumberStream", {"suffix": "m/s", "number": 35})
```

And for sparklines/line graphs, you can use a unix timestamp as follows:

```python
update.pushNumber("yourNumberStream", {"number": 13, "timestamp": 1329205474})
```

Finally, an array of numbers:

```python
update.pushNumber("yourSparklineStream", [{"number", 93, "timestamp": 1329205474}, {"number": 35, "timestamp": 1329206474}])
```

For number arrays, timestamps must be monotonically increasing, and each element of the array must have a timestamp.

Now we'll push some geographic coordinates to a map widget. You can use either the U.S. or world map widgets. The first coordinate (37.8) is the latitude and the second coordinate (-122.6) is the longitude. If your request is successful, you should see a data point appear on San Francisco, California. Optionally, if you'd like to set the color of your map point simply specify that in your function call. *Note*: only red, blue, green, purple, and yellow colors are supported at this time. Incorrect or missing color will default to red.

```python
update.pushGeo("yourGeoStream", 37.8, -122.6)
```

```python
update.pushGeo("yourGeoStream", 37.8, -122.6, "blue")
```

You can also push an array of latitude, longitude, and colors:

```python
update.pushGeo("yourGeoStream", [37.8, 12.3], [-122.6, 52], ["blue", "red"])
```

The above example will create two points. A blue point at (37.8, -122.6) and a red point at (12.3, 52). The color array is optional.

Here's how you push a title and message to a text feed widget:

```python
update.pushText("yourTextStream", "This is my title.", "Hello World!", "http://example.com/myimage.png")
```
The third parameter, the image URL, is optional.

Let's push an array of names and values to a leaderboard widget. Be sure to create the array first (you may call it whatever you'd like). Be careful to use the proper syntax. Next, push the array to your widget.

```python
leaderArray = [{"name": "Johnny", "value": 84}, {"name": "Jamie", "value": 75}, {"name": "Lance", "value": 62, "prefix": "$"}]

update.pushLeaderboard("yourBoardStream", leaderArray)
```

Similar to the last example, let's push a list of items to a list widget. Same rules as last time.

```python
listArray = ["Elizabeth", "Marshall", "Claire", "Nolan"]

update.pushList("yourListStream", listArray)
```

Image and Label widgets are now customizable through the API! Let's update an Image widget:

```python
update.pushImage("yourImageStream", "http://example.com/mypicture.png")
```

And a Label widget:

```python
update.pushLabel("yourLabelStream", "Uptime")
```

Updating an X-Y Pair widget:

```python
x = 15
y = 8
update.pushPair("yourPairStream", x, y)

# x and y can also be arrays, such as x = [10, 23, 45], y = [12, 90, 30]
# this would create three points at (10, 12), (23, 90) and (45, 30)
```

Updating a Table widget:

```python
headerRow = ['name', 'city', 'country']
dataRows = [ ['Lionel', 'Rosario', 'Argentina'], ['Andres', 'Albacete', 'Spain']]
update.pushTable("yourTableStream", headerRow, dataRows)
```

And clearing a widget. You can programmatically clear Map, Text Feed, Sparkline/Line Graph, and Pair widgets:

```python
update.clear("yourStreamName")
```

You can also push data to multiple streams in a single call using   `pushMultiple(data)`, where `data` is a list of dicts.  For convenience, `populate` functions, which take the same arguments as their corresponding `push` functions, can be used to create dicts that are properly formatted for `pushMultiple()`.

```python
multipush = []

multipush.append(update.populateNumber("MyNumberStream", 42))
multipush.append(leftconn.populateGeo("MyMap", 34, -118))

update.pushMultiple(multipush)
```

Ruby
----

**_Note_**: We also have a Leftronic Ruby Gem that offers the same functionality. You can download it on [Github](https://github.com/leftronic/leftronic-ruby) or on [RubyGems](https://rubygems.org/gems/leftronicapi).

Start by downloading the most recent version of our Ruby API at https://github.com/leftronic/leftronic/blob/master/ruby/leftronic.rb.

### Dependencies

[RubyGems](http://rubygems.org/pages/download) and [JSON](http://rubygems.org/gems/json). We recommend installing them with the [RubyGems](http://rubygems.org/pages/download) installer.

Require the leftronic gem

```ruby
require 'rubygems'
require 'leftronic'
```

Create a class instance with your API key. Feel free to name it whatever you'd like.

```ruby
leftronic = Leftronic.new "YOUR_ACCESS_KEY"
```

Here are some example functions to push to your dashboard. Be sure you have configured the correct widgets to accept custom data points. Also, be sure that you have entered your API access key correctly.

Let's start with pushing a number to a widget.

```ruby
update = leftronic.push_number "yourNumberStream", 14600
```

Now we'll push some geographic coordinates to a map widget. You can use either the U.S. or world map widgets. The first coordinate (37.8) is the latitude and the second coordinate (-122.6) is the longitude. If your request is successful, you should see a data point appear on San Francisco, California. Optionally, if you'd like to set the color of your map point simply specify that in your function call. *Note*: only red, blue, green, purple, and yellow colors are supported at this time. Incorrect or missing color will default to red.

```ruby
update = leftronic.push_geo "yourGeoStream", 37.8, -122.6
```

```ruby
update = leftronic.push_geo "yourGeoStream", 37.8, -122.6, :blue
```

Here's how you push a title and message to a text feed widget.

```ruby
update = leftronic.push_text "yourTextStream", "This is my title.", "Hello World!"
```

A leaderboard widget requires a hash. The widget will display the hash entries sorted by value.

```ruby
update = leftronic.push_leaderboard "yourBoardStream", some_hash
```
```ruby
update = leftronic.push_leaderboard "yourBoardStream", 'Johnny' => 84, 'Jamie' => 75, 'Lance' => 62
```

Finally, let's push an array to a list widget.

```ruby
update = leftronic.push_list "yourListStream", some_array
```
```ruby
update = leftronic.push_list "yourListStream", 'Elizabeth', 'Marshall', 'Claire', 'Nolan'
```

Java
----

Our Java API was created by Webmetrics and is available at https://github.com/webmetrics/leftronic-java.

At this time we do not offer support for our Java API but we have tested it, and it works.

Feedback and Issues
-------------------

If you notice any bugs or other issues, submit a patch or send us a pull request. You can also send us an email at <support@leftronic.com>.
