(function() {
    'use strict';
    var map;
    var markers = [];

    function initialize() {
        // Get the user's location
        function GetLocation(location) {
            var lat = location.coords.latitude;
            var lng = location.coords.longitude;
            var marker = addMarker(lat, lng);
            map.setCenter(marker.getPosition());
            // Store the coordinates in local storage
        }
        // Load all the backbone models and views from the server
        loadBackbone();
        navigator.geolocation.getCurrentPosition(GetLocation);
        var mapOptions = {
            zoom: 8,
            disableDefaultUI: true
        };
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    }

    function addMarker(lat, lng, bubble) {
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(lat, lng),
            map: map,
            draggable: false
        });
        var infoBubble = bubble;
        var infowindow = new google.maps.InfoWindow({
            content: infoBubble
        });
        google.maps.event.addListener(marker, 'click', function() {
            onMarkerClick(marker, infowindow);
        });
        markers.push(marker);
        setAllMap(map);
        return marker;
    }

    function onMarkerClick(marker, bubbleWindow) {
        bubbleWindow.open(map, marker);
    }
    // Sets the map on all markers in the array.
    function setAllMap(map) {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
        }
    }

    function clearMarkers() {
        setAllMap(null);
    }
    // Deletes all markers in the array by removing references to them.
    function deleteMarkers() {
        clearMarkers();
        markers = [];
    }

    function loadBackbone() {
        // The container that holds all the dishes
        $dish_container = $('#dishes-container');

        function doAjax() {
            // If not parametes are specified we set them to a default value
            var defaults = {
                'radius': 5,
                'rating': 4,
                'price': 50
            };
            // Get the values from the slider, if none are specified set them as default
            var d = distance_slider.val() || defaults.radius;
            var r = rating_slider.val() || defaults.rating;
            var p = price_slider.val() || defaults.price;
            // Make a request to our endpoint
            Backbone.ajax({
                // Return back a json response
                dataType: "json",
                // the endpoint where we will retrieve our models from
                url: "/discovery/ajax",
                data: {
                    radius: d,
                    rating: r,
                    price: p
                },
                success: function(response) {
                    var json = response['local_cooks'];
                    //console.log(json);
                    // Remove all the previous models
                    // Clear the html and remove all the markers, to add the new models in
                    $dish_container.empty();
                    deleteMarkers();
                    if (json.length != 0) {
                        json.forEach(function(discoveryModel) {
                            var d = new DiscoveryModel(discoveryModel);
                            var dv = new DiscoveryView({
                                model: d
                            });
                        });
                    } else {
                        $dish_container.append("<h2>No Dishes Found</h2>");
                    }
                }
            });
        }
        var valueBubble = '<output class="rangeslider__value-bubble" />',
            tempPosition, position;
        // The slider for the price slider
        var price_slider = $('#price_slider').rangeslider({
            polyfill: false,
            rangeClass: 'rangeslider',
            fillClass: 'rangeslider__fill',
            handleClass: 'rangeslider__handle',
            onInit: function() {
                this.$range.append($(valueBubble));
                this.update();
            },
            onSlideEnd: function(position, value) {
                var $valueBubble = $('.rangeslider__value-bubble', this.$range).fadeOut();
                doAjax();
            },
            onSlide: function(pos, value) {
                var $valueBubble = $('.rangeslider__value-bubble', this.$range).fadeIn();
                tempPosition = pos + this.grabX;
                position = (tempPosition <= this.handleWidth) ? this.handleWidth : (tempPosition >= this.maxHandleX) ? this.maxHandleX : tempPosition;
                if ($valueBubble.length) {
                    $valueBubble[0].style.left = Math.ceil(position) + 'px';
                    $valueBubble[0].innerHTML = '$' + value;
                }
            }
        });
        // The slider for the distance slider
        var distance_slider = $('#distance_slider').rangeslider({
            polyfill: false,
            rangeClass: 'rangeslider',
            fillClass: 'rangeslider__fill',
            handleClass: 'rangeslider__handle',
            onInit: function() {
                this.$range.append($(valueBubble));
                this.update();
            },
            onSlideEnd: function(pos, value) {
                var $valueBubble = $('.rangeslider__value-bubble', this.$range).fadeOut();
                doAjax();
            },
            onSlide: function(pos, value) {
                var $valueBubble = $('.rangeslider__value-bubble', this.$range).fadeIn();
                tempPosition = pos + this.grabX;
                position = (tempPosition <= this.handleWidth) ? this.handleWidth : (tempPosition >= this.maxHandleX) ? this.maxHandleX : tempPosition;
                if ($valueBubble.length) {
                    $valueBubble[0].style.left = Math.ceil(position) + 'px';
                    $valueBubble[0].innerHTML = value + ' km';
                }
            }
        });
        // The slider for the rating slider
        var rating_slider = $('#rating_slider').rangeslider({
            polyfill: false,
            rangeClass: 'rangeslider',
            fillClass: 'rangeslider__fill',
            handleClass: 'rangeslider__handle',
            onInit: function() {
                this.$range.append($(valueBubble));
                this.update();
            },
            onSlideEnd: function(position, value) {
                var $valueBubble = $('.rangeslider__value-bubble', this.$range).fadeOut();
                doAjax();
            },
            onSlide: function(pos, value) {
                var $valueBubble = $('.rangeslider__value-bubble', this.$range).fadeIn();
                tempPosition = pos + this.grabX;
                position = (tempPosition <= this.handleWidth) ? this.handleWidth : (tempPosition >= this.maxHandleX) ? this.maxHandleX : tempPosition;
                if ($valueBubble.length) {
                    $valueBubble[0].style.left = Math.ceil(position) + 'px';
                    var label = ' stars';
                    if (value == 1) {
                        label = ' star';
                    }
                    $valueBubble[0].innerHTML = value + label;
                }
            }
        });
        // Model
        DiscoveryModel = Backbone.Model.extend({});
        // View
        DiscoveryView = Backbone.View.extend({
            el: $dish_container,
            dish_template: _.template("<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'><div class='meal-card'><img src='<%= hm_dish.photo_path %>'/><div class='row data'><div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'><h4 class='meal-name'><a href='<% print('dishes/view/' + hm_dish.dish_id); %>'><%= hm_dish.dish_name %></a><span class='price pull-right'>$<%= hm_dish.dish_price %></span></h4><h6 class='meal-cook'><a href='<% print('/cooks/profile/' + hm_cook.cook_id); %>'><% print(hm_cook.first_name + ' ' + hm_cook.last_name) %></a></h6></div></div></div></div>"),
            marker_bubble_template: _.template("<div id='content' class='map-bubble'><div id='siteNotice'></div><img class='chef-bubble-img' src='<% print(hm_cook.cook_photo);%>'/><h3 id='firstHeading' class='firstHeading'><a href='<% print('/cooks/profile/' + hm_cook.cook_id);  %>'><% print(hm_cook.first_name + ' ' + hm_cook.last_name); %></a></h3><div id='bodyContent'><p><%= hm_cook.cook_description %></p></div></div>"),
            initialize: function() {
                this.render();
            },
            render: function() {
                // Grab all the data from the model
                var json = this.model.toJSON();
                // Render and append the dish block to the dish list
                //this.$el.append(this.dish_template(this.model.toJSON()));
                $(this.dish_template(this.model.toJSON())).hide().appendTo(this.$el).fadeIn(400);
                // Add the marker with this dish to the map.
                addMarker(json.hm_marker.lat, json.hm_marker.lng, this.marker_bubble_template(json));
            }
        });
        // When the page is loaded, get the data from the server
        doAjax();
    }
    google.maps.event.addDomListener(window, 'load', initialize);
}());