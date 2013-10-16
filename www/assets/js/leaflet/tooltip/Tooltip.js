L.Tooltip = L.Class.extend({
	initialize: function (map) {
		this._map = map;
		this._popupPane = map._panes.popupPane;

		this._container = L.DomUtil.create('div', 'leaflet-draw-tooltip', this._popupPane);
		this._singleLineLabel = false;
        this._power = true;
        map.on("mousemove",this._mouseMove,this);
	},

    dispose: function () {
        this._popupPane.removeChild(this._container);
        this._container = null;

    },

    powerOn:function(){
        map.on("mousemove",this._mouseMove,this);
        L.DomUtil.removeClass(this._container, 'leaflet-draw-tooltip-off');
        this._power = true;
    },
    powerOff:function(){
        map.off("mousemove",this._mouseMove,this);
        L.DomUtil.addClass(this._container, 'leaflet-draw-tooltip-off');
        this._power = false;
    },
    _mouseMove:function(e){
        var latlng = e.latlng;
        this.updatePosition(latlng);
    },



	updateContent: function (labelText) {
		labelText.subtext = labelText.subtext || '';

		// update the vertical position (only if changed)
		if (labelText.subtext.length === 0 && !this._singleLineLabel) {
			L.DomUtil.addClass(this._container, 'leaflet-draw-tooltip-single');
			this._singleLineLabel = true;
		}
		else if (labelText.subtext.length > 0 && this._singleLineLabel) {
			L.DomUtil.removeClass(this._container, 'leaflet-draw-tooltip-single');
			this._singleLineLabel = false;
		}

		this._container.innerHTML =
			(labelText.subtext.length > 0 ? '<span class="leaflet-draw-tooltip-subtext">' + labelText.subtext + '</span>' + '<br />' : '') +
			'<span>' + labelText.text + '</span>';

		return this;
	},

	updatePosition: function (latlng) {
		var pos = this._map.latLngToLayerPoint(latlng);
        // Смещение подсказки
        pos.x+=20;        pos.y-=15;        
		L.DomUtil.setPosition(this._container, pos);

		return this;
	},

	showAsError: function () {
		L.DomUtil.addClass(this._container, 'leaflet-error-draw-tooltip');
		return this;
	},

	removeError: function () {
		L.DomUtil.removeClass(this._container, 'leaflet-error-draw-tooltip');
		return this;
	}
});