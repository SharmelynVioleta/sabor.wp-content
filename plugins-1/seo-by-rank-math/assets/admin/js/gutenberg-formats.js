!function(){var t={184:function(t,e){var r;!function(){"use strict";var n={}.hasOwnProperty;function o(){for(var t=[],e=0;e<arguments.length;e++){var r=arguments[e];if(r){var i=typeof r;if("string"===i||"number"===i)t.push(r);else if(Array.isArray(r)){if(r.length){var a=o.apply(null,r);a&&t.push(a)}}else if("object"===i){if(r.toString!==Object.prototype.toString&&!r.toString.toString().includes("[native code]")){t.push(r.toString());continue}for(var l in r)n.call(r,l)&&r[l]&&t.push(l)}}}return t.join(" ")}t.exports?(o.default=o,t.exports=o):void 0===(r=function(){return o}.apply(e,[]))||(t.exports=r)}()}},e={};function r(n){var o=e[n];if(void 0!==o)return o.exports;var i=e[n]={exports:{}};return t[n](i,i.exports,r),i.exports}r.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return r.d(e,{a:e}),e},r.d=function(t,e){for(var n in e)r.o(e,n)&&!r.o(t,n)&&Object.defineProperty(t,n,{enumerable:!0,get:e[n]})},r.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},function(){"use strict";var t=wp.richText,e=wp.i18n,n=wp.url,o=wp.htmlEntities,i=wp.element,a=r(184),l=r.n(a);const u=t=>(0,i.createElement)("path",t),c=({className:t,isPressed:e,...r})=>{const n={...r,className:l()(t,{"is-pressed":e})||void 0,"aria-hidden":!0,focusable:!1};return(0,i.createElement)("svg",{...n})};var s=(0,i.createElement)(c,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24"},(0,i.createElement)(u,{d:"M15.6 7.3h-.7l1.6-3.5-.9-.4-3.9 8.5H9v1.5h2l-1.3 2.8H8.4c-2 0-3.7-1.7-3.7-3.7s1.7-3.7 3.7-3.7H10V7.3H8.4c-2.9 0-5.2 2.3-5.2 5.2 0 2.9 2.3 5.2 5.2 5.2H9l-1.4 3.2.9.4 5.7-12.5h1.4c2 0 3.7 1.7 3.7 3.7s-1.7 3.7-3.7 3.7H14v1.5h1.6c2.9 0 5.2-2.3 5.2-5.2 0-2.9-2.4-5.2-5.2-5.2z"}));var f=(0,i.createElement)(c,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24"},(0,i.createElement)(u,{d:"M15.6 7.2H14v1.5h1.6c2 0 3.7 1.7 3.7 3.7s-1.7 3.7-3.7 3.7H14v1.5h1.6c2.8 0 5.2-2.3 5.2-5.2 0-2.9-2.3-5.2-5.2-5.2zM4.7 12.4c0-2 1.7-3.7 3.7-3.7H10V7.2H8.4c-2.9 0-5.2 2.3-5.2 5.2 0 2.9 2.3 5.2 5.2 5.2H10v-1.5H8.4c-2 0-3.7-1.7-3.7-3.7zm4.6.9h5.3v-1.5H9.3v1.5z"})),p=wp.blockEditor,m=lodash,y=wp.components;function b(t){return b="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},b(t)}function d(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,n)}return r}function v(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?d(Object(r),!0).forEach((function(e){h(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):d(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}function h(t,e,r){return(e=function(t){var e=function(t,e){if("object"!==b(t)||null===t)return t;var r=t[Symbol.toPrimitive];if(void 0!==r){var n=r.call(t,e||"default");if("object"!==b(n))return n;throw new TypeError("@@toPrimitive must return a primitive value.")}return("string"===e?String:Number)(t)}(t,"string");return"symbol"===b(e)?e:String(e)}(e))in t?Object.defineProperty(t,e,{value:r,enumerable:!0,configurable:!0,writable:!0}):t[e]=r,t}function g(t,e){return function(t){if(Array.isArray(t))return t}(t)||function(t,e){var r=null==t?null:"undefined"!=typeof Symbol&&t[Symbol.iterator]||t["@@iterator"];if(null!=r){var n,o,i,a,l=[],u=!0,c=!1;try{if(i=(r=r.call(t)).next,0===e){if(Object(r)!==r)return;u=!1}else for(;!(u=(n=i.call(r)).done)&&(l.push(n.value),l.length!==e);u=!0);}catch(t){c=!0,o=t}finally{try{if(!u&&null!=r.return&&(a=r.return(),Object(a)!==a))return}finally{if(c)throw o}}return l}}(t,e)||function(t,e){if(!t)return;if("string"==typeof t)return w(t,e);var r=Object.prototype.toString.call(t).slice(8,-1);"Object"===r&&t.constructor&&(r=t.constructor.name);if("Map"===r||"Set"===r)return Array.from(t);if("Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r))return w(t,e)}(t,e)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function w(t,e){(null==e||e>t.length)&&(e=t.length);for(var r=0,n=new Array(e);r<e;r++)n[r]=t[r];return n}var O=(0,y.withSpokenMessages)((function(r){var o=r.isActive,a=r.activeAttributes,l=r.addingLink,u=r.value,c=r.onChange,s=r.speak,f=r.stopAddingLink,b=r.contentRef,d=g((0,i.useState)(),2),h=d[0],w=d[1],O=v({url:a.url,type:a.type,id:a.id,opensInNewTab:"_blank"===a.target,noFollow:!(0,m.isUndefined)(a.rel)&&-1!==a.rel.indexOf("nofollow"),sponsored:!(0,m.isUndefined)(a.rel)&&-1!==a.rel.indexOf("sponsored")},h),S=(0,i.useRef)(!!l&&"firstElement"),k=[{id:"opensInNewTab",title:(0,e.__)("Open in new tab.","rank-math")},{id:"noFollow",title:(0,e.__)("Set to nofollow.","rank-math")},{id:"sponsored",title:(0,e.__)("Set to sponsored.","rank-math")}],j=(0,t.useAnchorRef)({ref:b,value:u,settings:A});return wp.element.createElement(y.Popover,{anchorRef:j,focusOnMount:S.current,onClose:f,position:"bottom center"},wp.element.createElement(p.__experimentalLinkControl,{value:O,onChange:function(r){r=v(v({},h),r);var i=O.url===r.url&&(O.opensInNewTab!==r.opensInNewTab||O.noFollow!==r.noFollow||O.sponsored!==r.sponsored),a=i&&(0,m.isUndefined)(r.url);if(w(a?r:void 0),!a){var l=(0,n.prependHTTP)(r.url),p=function(t){var r=t.url,n=t.opensInNewWindow,o=t.noFollow,i=t.sponsored,a=t.text,l=t.type,u=t.id,c={type:"core/link",attributes:{url:r}},s=[];if(n){if(c.attributes.target="_blank",!(0,m.isUndefined)(a)){var f=(0,e.sprintf)((0,e.__)("%s (opens in a new tab)","rank-math"),a);c.attributes["aria-label"]=f}s.push("noreferrer noopener")}return l&&(c.attributes.type=l),u&&(c.attributes.id=u),o&&s.push("nofollow"),i&&s.push("sponsored"),s.length>0&&(c.attributes.rel=s.join(" ")),c}({url:l,type:r.type,id:(0,m.isUndefined)(r.id)||(0,m.isNull)(r.id)?void 0:String(r.id),opensInNewWindow:r.opensInNewTab,noFollow:r.noFollow,sponsored:r.sponsored});if((0,t.isCollapsed)(u)&&!o){var y=r.title||l,b=(0,t.applyFormat)((0,t.create)({text:y}),p,0,y.length);c((0,t.insert)(u,b))}else{var d=(0,t.applyFormat)(u,p);d.start=d.end,d.activeFormats=[],c(d)}i||f(),!function(t){if(!t)return!1;var e=t.trim();if(!e)return!1;if(/^\S+:/.test(e)){var r=(0,n.getProtocol)(e);if(!(0,n.isValidProtocol)(r))return!1;if((0,m.startsWith)(r,"http")&&!/^https?:\/\/[^\/\s]/i.test(e))return!1;var o=(0,n.getAuthority)(e);if(!(0,n.isValidAuthority)(o))return!1;var i=(0,n.getPath)(e);if(i&&!(0,n.isValidPath)(i))return!1;var a=(0,n.getQueryString)(e);if(a&&!(0,n.isValidQueryString)(a))return!1;var l=(0,n.getFragment)(e);if(l&&!(0,n.isValidFragment)(l))return!1}return!((0,m.startsWith)(e,"#")&&!(0,n.isValidFragment)(e))}(l)?s((0,e.__)("Warning: the link has been inserted but may have errors. Please test it.","rank-math"),"assertive"):s(o?(0,e.__)("Link edited.","rank-math"):(0,e.__)("Link inserted.","rank-math"),"assertive")}},forceIsEditingLink:l,settings:k}))}));function S(t){return S="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},S(t)}function k(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,n)}return r}function j(t,e,r){return(e=function(t){var e=function(t,e){if("object"!==S(t)||null===t)return t;var r=t[Symbol.toPrimitive];if(void 0!==r){var n=r.call(t,e||"default");if("object"!==S(n))return n;throw new TypeError("@@toPrimitive must return a primitive value.")}return("string"===e?String:Number)(t)}(t,"string");return"symbol"===S(e)?e:String(e)}(e))in t?Object.defineProperty(t,e,{value:r,enumerable:!0,configurable:!0,writable:!0}):t[e]=r,t}function P(t,e){return function(t){if(Array.isArray(t))return t}(t)||function(t,e){var r=null==t?null:"undefined"!=typeof Symbol&&t[Symbol.iterator]||t["@@iterator"];if(null!=r){var n,o,i,a,l=[],u=!0,c=!1;try{if(i=(r=r.call(t)).next,0===e){if(Object(r)!==r)return;u=!1}else for(;!(u=(n=i.call(r)).done)&&(l.push(n.value),l.length!==e);u=!0);}catch(t){c=!0,o=t}finally{try{if(!u&&null!=r.return&&(a=r.return(),Object(a)!==a))return}finally{if(c)throw o}}return l}}(t,e)||function(t,e){if(!t)return;if("string"==typeof t)return E(t,e);var r=Object.prototype.toString.call(t).slice(8,-1);"Object"===r&&t.constructor&&(r=t.constructor.name);if("Map"===r||"Set"===r)return Array.from(t);if("Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r))return E(t,e)}(t,e)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function E(t,e){(null==e||e>t.length)&&(e=t.length);for(var r=0,n=new Array(e);r<e;r++)n[r]=t[r];return n}var _="core/link";var x=function(r){var o=r.isActive,a=r.activeAttributes,l=r.value,u=r.onChange,c=r.onFocus,m=r.contentRef,y=P((0,i.useState)(!1),2),b=y[0],d=y[1];function v(){var e=(0,t.getTextContent)((0,t.slice)(l));e&&(0,n.isURL)(e)?u((0,t.applyFormat)(l,{type:_,attributes:{url:e}})):e&&(0,n.isEmail)(e)?u((0,t.applyFormat)(l,{type:_,attributes:{url:"mailto:".concat(e)}})):d(!0)}function h(){var e=l;e=(0,t.removeFormat)(e,"core/link"),u(function(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?k(Object(r),!0).forEach((function(e){j(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):k(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}({},e))}return wp.element.createElement(React.Fragment,null,wp.element.createElement(p.RichTextShortcut,{type:"primary",character:"k",onUse:v}),wp.element.createElement(p.RichTextShortcut,{type:"primaryShift",character:"k",onUse:h}),o&&wp.element.createElement(p.RichTextToolbarButton,{name:"link",className:"rank-math-link-control",icon:s,title:(0,e.__)("Unlink","rank-math"),onClick:h,isActive:o,shortcutType:"primaryShift",shortcutCharacter:"k"}),!o&&wp.element.createElement(p.RichTextToolbarButton,{name:"link",icon:f,className:"rank-math-link-control",title:(0,e.__)("Link","rank-math"),onClick:v,isActive:o,shortcutType:"primary",shortcutCharacter:"k"}),(b||o)&&wp.element.createElement(O,{addingLink:b,stopAddingLink:function(){d(!1),c()},isActive:o,activeAttributes:a,value:l,onChange:u,contentRef:m}))},A={name:"core/link",title:(0,e.__)("Link","rank-math"),tagName:"a",className:null,attributes:{url:"href",type:"data-type",id:"data-id",target:"target",rel:"rel"},__unstablePasteRule:function(e,r){var i=r.html,a=r.plainText;if((0,t.isCollapsed)(e))return e;var l=(i||a).replace(/<[^>]+>/g,"").trim();return(0,n.isURL)(l)?(window.console.log("Created link:\n\n",l),(0,t.applyFormat)(e,{type:"core/link",attributes:{url:(0,o.decodeEntities)(l)}})):e},edit:x},T=["name","replaces"];function F(t,e){if(null==t)return{};var r,n,o=function(t,e){if(null==t)return{};var r,n,o={},i=Object.keys(t);for(n=0;n<i.length;n++)r=i[n],e.indexOf(r)>=0||(o[r]=t[r]);return o}(t,e);if(Object.getOwnPropertySymbols){var i=Object.getOwnPropertySymbols(t);for(n=0;n<i.length;n++)r=i[n],e.indexOf(r)>=0||Object.prototype.propertyIsEnumerable.call(t,r)&&(o[r]=t[r])}return o}wp.domReady((function(){[A].forEach((function(e){var r=e.name,n=(e.replaces,F(e,T));r&&((0,t.unregisterFormatType)("core/link"),(0,t.registerFormatType)(r,n))}))}))}()}();