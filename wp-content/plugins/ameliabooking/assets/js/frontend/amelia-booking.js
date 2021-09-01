/* eslint-disable no-undef */
import axios from 'axios'
import ElementUI from 'element-ui'
import locale from 'element-ui/lib/locale/lang/en'
import VCalendar from 'v-calendar'
import 'idempotent-babel-polyfill'
import moment from 'moment'
import VueMomentJS from 'vue-momentjs'
import Lightbox from 'vue-pure-lightbox'
import dateMixin from '../../js/common/mixins/dateMixin'
import store from './store'

const Vue = (typeof window !== 'undefined' && 'Vue' in window && window.Vue && ('useWindowVueInAmelia' in window ? window.useWindowVueInAmelia[0] === '1' : true)) ? window.Vue : require('vue')

// eslint-disable-next-line no-undef, camelcase
__webpack_public_path__ = wpAmeliaUrls.wpAmeliaPluginURL + 'public/'

let components = null

const Booking = () => import(/* webpackChunkName: "booking" */ '../../views/frontend/booking/Booking.vue')
const EventsList = () => import(/* webpackChunkName: "events-list" */ '../../views/frontend/events/EventsList.vue')
components = {Booking, EventsList}

Vue.prototype.$http = axios
Vue.prototype.$http.defaults.headers.common = {
  'X-Requested-With': 'XMLHttpRequest'
}

Vue.use(VueMomentJS, moment)
Vue.use(ElementUI, {locale})
Vue.use(VCalendar, {
  firstDayOfWeek: window.wpAmeliaSettings.wordpress.startOfWeek + 1,
  locale: 'ameliaCalendarLocale' in window && window.ameliaCalendarLocale[0] ? window.ameliaCalendarLocale[0].replace('_', '-') : window.localeLanguage[0].replace('_', '-')
})
Vue.use(Lightbox)

function ameliaLazyLoading () {
  if (!('ameliaBooking' in window)) {
    window['ameliaBooking'] = {}
  }

  if (!('counter' in window['ameliaBooking'])) {
    window['ameliaBooking']['counter'] =
      (window.bookingEntitiesIds !== undefined ? window.bookingEntitiesIds.length : 0) +
      (window.lazyBookingEntitiesIds !== undefined ? window.lazyBookingEntitiesIds.length : 0)
  }

  if (window.lazyBookingEntitiesIds !== undefined) {
    window.lazyBookingEntitiesIds.forEach((shortCodeData) => {
      var ameliaPopUpLoaded = false;

      var ameliaBookingButtonLoadInterval = setInterval(
        function () {
          var ameliaPopUpButton = document.getElementById(shortCodeData.trigger);

          if (!ameliaPopUpLoaded && ameliaPopUpButton !== null && typeof ameliaPopUpButton !== 'undefined') {
            ameliaPopUpLoaded = true;

            clearInterval(ameliaBookingButtonLoadInterval);

            ameliaPopUpButton.onclick = function () {
              var ameliaBookingFormLoadInterval = setInterval(
                function () {
                  var ameliaPopUpForms = document.getElementsByClassName('amelia-skip-load-' + shortCodeData.counter);

                  if (ameliaPopUpForms.length) {
                    clearInterval(ameliaBookingFormLoadInterval);

                    for (var i = 0; i < ameliaPopUpForms.length; i++) {
                      ameliaLoading(ameliaPopUpForms[i].parentElement, null, JSON.parse(JSON.stringify(shortCodeData)), false);
                    }
                  }
                },
                1000
              );
            };
          }
        },
        1000
      );
    })
  }
}

function ameliaLoading (element, selector, ids, isAutoLoading) {
  if ('ameliaBooking' in window && 'containerIds' in window['ameliaBooking'] && selector !== null) {
    if (window['ameliaBooking']['containerIds'].indexOf(selector) !== -1) {
      return
    }

    window['ameliaBooking']['containerIds'].push(selector)
  }

  let manuallyLoadedData = null

  if (element !== null) {
    manuallyLoadedData = ids
    manuallyLoadedData.counter = window['ameliaBooking']['counter']
    window['ameliaBooking']['counter']++
  }

  // eslint-disable-next-line no-new
  var ameliaContainers = element === null ? document.getElementsByClassName('amelia-frontend') : element.getElementsByClassName('amelia-frontend')

  var ameliaVueInstances = []

  for (var i = 0; i < ameliaContainers.length; i++) {
    if (ameliaContainers[i].classList.contains('amelia-skip-load') && (typeof isAutoLoading !== 'undefined' && isAutoLoading)) {
      continue
    }

    ameliaVueInstances.push(
      new Vue({
        el: ameliaContainers[i],

        store,

        mixins: [dateMixin],

        components: components,

        data: {
          getAjaxUrl: location.protocol === 'https:' ? wpAmeliaUrls.wpAmeliaPluginAjaxURL.replace('http:', 'https:') : wpAmeliaUrls.wpAmeliaPluginAjaxURL,
          getUrl: location.protocol === 'https:' ? wpAmeliaUrls.wpAmeliaPluginURL.replace('http:', 'https:') : wpAmeliaUrls.wpAmeliaPluginURL,
          useUploadsAmeliaPath: wpAmeliaUrls.wpAmeliaUseUploadsAmeliaPath,
          isLite: true,
          labels: window.wpAmeliaLabels,
          licence: {
            isBasic: false,
            isPro: true,
            isDeveloper: false,
            isLite: false
          },
          timezones: 'wpAmeliaTimeZones' in window ? window.wpAmeliaTimeZones : [],
          timezone: 'wpAmeliaTimeZone' in window ? window.wpAmeliaTimeZone[0] : '',
          settings: JSON.parse(JSON.stringify(window.wpAmeliaSettings)),
          clonedSettings: JSON.parse(JSON.stringify(window.wpAmeliaSettings)),
          shortcodeData: {
            enabled: false,
            booking: {
              show: manuallyLoadedData !== null && 'show' in manuallyLoadedData ? manuallyLoadedData.show : '',
              package: manuallyLoadedData !== null && 'package' in manuallyLoadedData ? manuallyLoadedData.package : '',
              category: manuallyLoadedData !== null && 'category' in manuallyLoadedData ? manuallyLoadedData.category : '',
              service: manuallyLoadedData !== null && 'service' in manuallyLoadedData ? manuallyLoadedData.service : '',
              employee: manuallyLoadedData !== null && 'employee' in manuallyLoadedData ? manuallyLoadedData.employee : '',
              location: manuallyLoadedData !== null && 'location' in manuallyLoadedData ? manuallyLoadedData.location : '',
              eventId: manuallyLoadedData !== null && 'eventId' in manuallyLoadedData ? manuallyLoadedData.eventId : null,
              eventTag: manuallyLoadedData !== null && 'eventTag' in manuallyLoadedData ? manuallyLoadedData.eventTag : null,
              eventRecurring: manuallyLoadedData !== null && 'eventRecurring' in manuallyLoadedData ? manuallyLoadedData.eventRecurring : null,
            },
            search: {
              today: ''
            },
            cabinet: {
              appointments: false,
              events: false
            },
            hasCategoryShortcode: '',
            hasBookingShortcode: '',
            hasEventShortcode: '',
            counter: manuallyLoadedData !== null ? manuallyLoadedData.counter : ''
          },
          hasApiCall: null,
          useTranslations: window.wpAmeliaSettings.general.usedLanguages
            ? window.wpAmeliaSettings.general.usedLanguages.indexOf(window.localeLanguage[0]) !== -1 : false,
          fileUploadExtensions: fileUploadExtensions
        },

        mounted () {
          moment.locale(window.localeLanguage[0])
          if (window.localeLanguage[0] === 'ar') {
            this.reformatArabicNumbers()
          }

          if (window.localeLanguage[0] === 'fa_IR') {
            this.reformatFarsiNumbers()
          }

          let bookingData = null

          if (manuallyLoadedData === null) {
            bookingData = typeof window.bookingEntitiesIds !== 'undefined' ? window.bookingEntitiesIds.shift() : null
          } else {
            bookingData = manuallyLoadedData
          }

          this.shortcodeData.booking = bookingData ? {
            show: 'show' in bookingData && bookingData.show ? bookingData.show : null,
            package: 'package' in bookingData && bookingData.package ? parseInt(bookingData.package) : null,
            category: 'category' in bookingData && bookingData.category ? parseInt(bookingData.category) : null,
            service: 'service' in bookingData && bookingData.service ? parseInt(bookingData.service) : null,
            employee: 'employee' in bookingData && bookingData.employee ? parseInt(bookingData.employee) : null,
            location: 'location' in bookingData && bookingData.location ? parseInt(bookingData.location) : null,
            eventId: 'eventId' in bookingData && bookingData.eventId ? parseInt(bookingData.eventId) : null,
            eventTag: 'eventTag' in bookingData ? bookingData.eventTag : null,
            eventRecurring: 'eventRecurring' in bookingData ? bookingData.eventRecurring : null
          } : null

          this.hasApiCall = 'hasApiCall' in bookingData && manuallyLoadedData === null ? bookingData.hasApiCall : 1

          this.shortcodeData.cabinet = bookingData ? {
            appointments: !!('appointments' in bookingData && bookingData.appointments),
            events: !!('events' in bookingData && bookingData.events)
          } : null

          this.shortcodeData.searchToday = typeof window.searchToday !== 'undefined' ? window.searchToday : null

          this.shortcodeData.counter = (bookingData ? bookingData.counter : '')
          this.shortcodeData.hasCategoryShortcode = typeof window.hasCategoryShortcode !== 'undefined' ? window.hasCategoryShortcode : ''
          this.shortcodeData.hasBookingShortcode = typeof window.hasBookingShortcode !== 'undefined' ? window.hasBookingShortcode : ''
          this.shortcodeData.hasEventShortcode = typeof window.hasEventShortcode !== 'undefined' ? window.hasEventShortcode : ''
          this.shortcodeData.enabled = this.shortcodeData.booking !== null && !Object.values(this.shortcodeData.booking).every(x => (x === null || x === '' || isNaN(x)))
        }
      })
    )
  }
}

var disableAutomaticLoading = false

if ('ameliaBooking' in window && 'disableAutomaticLoading' in window['ameliaBooking'] && window['ameliaBooking']['disableAutomaticLoading'] === true) {
  window['ameliaBooking']['containerIds'] = []
  window['ameliaBooking']['load'] = ameliaLoading
  window['ameliaBooking']['counter'] =
    (window.bookingEntitiesIds !== 'undefined' ? window.bookingEntitiesIds.length : 0) +
    (window.lazyBookingEntitiesIds !== 'undefined' ? window.lazyBookingEntitiesIds.length : 0)
  disableAutomaticLoading = true
}

if (document.getElementsByClassName('amelia-frontend').length === 0) {
  document.addEventListener('DOMContentLoaded', function () {
    if (!disableAutomaticLoading) {
      ameliaLoading(null, null, null, true)
    }

    setTimeout(ameliaLazyLoading, 1000);
  })
} else {
  if (!disableAutomaticLoading) {
    ameliaLoading(null, null, null, true)

    setTimeout(ameliaLazyLoading, 1000);
  }
}
