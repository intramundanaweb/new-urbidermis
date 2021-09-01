<template>
  <div class="am-wrap">
    <!-- Spinner -->
    <div class="am-spinner am-section" v-show="!fetched">
      <img class="svg-booking am-spin" :src="$root.getUrl + 'public/img/oval-spinner.svg'">
      <img class="svg-booking am-hourglass" :src="$root.getUrl + 'public/img/hourglass.svg'">
    </div>

    <div id="am-events-booking" v-show="fetched">
      <!-- Event Filter -->
      <div class="am-events-filter">
        <el-row :gutter="24">
          <el-col
            v-show="showTags()"
            :sm="getColumnLength()[0]"
            :class="$root.settings.customization.forms ? `el-form-item am-select-${$options.name}`: ''"
          >
            <el-select
              v-model="params.tag"
              :placeholder="eventFilterLabels.event_type.value || $root.labels.event_type"
              :popper-class="$root.settings.customization.forms ? `am-dropdown-${$options.name}` : ''"
              clearable
              value=""
              @change="getEvents(false)"
            >
              <el-option
                v-for="(tag, index) in options.entities.tags.map(eventTag => eventTag.name)"
                :key="index"
                :label="tag"
                :value="tag"
              >
              </el-option>
            </el-select>
          </el-col>
          <el-col
            v-show="showDatePicker()"
            :sm="getColumnLength()[1]"
            :class="$root.settings.customization.forms ? `am-calendar-${$options.name}`: ''"
            class="v-calendar-column"
          >
            <v-date-picker
              :input-props="{class: 'el-input__inner', placeholder: this.$root.labels.event_pick_min_date, readonly: true}"
              @input="getEvents(false)"
              popover-visibility="focus"
              popover-direction="bottom"
              popover-align="center"
              v-model="params.date"
              mode="single"
              id="am-calendar-picker"
              class="am-calendar-picker"
              tint-color='#1A84EE'
              :show-day-popover=false
              :is-expanded=false
              :is-inline=false
              :is-required=true
              :formats="vCalendarFormats"
            >
            </v-date-picker>
          </el-col>
        </el-row>
      </div>

      <!-- Event List -->
      <div class="am-event-list" :style="{'opacity': !fetchedFiltered ? '0.3' : 1, 'pointer-events': fetchedFiltered ? 'all' : 'none'}">

        <!-- Event -->
        <div
          v-for="(evt, index) in events"
          v-if="evt.show"
          :id="'am-event-' + evt.id"
          :key="index"
          class="am-event"
          :class="[{
            'am-active': evt.showEventDetails,
            'inactive': events.filter(event => (event.showEventDetails || event.showEventBooking || event.showAddToCalendar) && event.id !== evt.id).length > 0,
            'canceled': getEventAvailability(evt).class === 'canceled',
            'closed': getEventAvailability(evt).class === 'closed' && !evt.showAddToCalendar,
            'full': getEventAvailability(evt).class === 'full',
            'upcoming': getEventAvailability(evt).class === 'upcoming'
          }, $root.settings.customization.forms ? `am-form-${$options.name}` : '']"
          :style="{'pointer-events': evt.showAddToCalendar ? 'all' : (getEventAvailability(evt).class !== 'open' ? 'none' : 'all')}"
        >
          <!-- Event Data -->
          <div class="am-event-data" @click="getEventAvailability(evt).class !== 'open' ? function () {} : toggleEventDetails(evt)">

            <!-- Event Dates -->
            <div v-if="isEventInSameDay(evt)" class="am-event-date">
              <div class="am-event-date-month" :style="getBookableColor(evt, false)">
                {{ getEventFrontedFormattedDate(evt.periods[0].periodStart).split(' ')[0] }}
              </div>
              <div class="am-event-date-day">
                {{ getEventFrontedFormattedDate(evt.periods[0].periodStart).split(' ')[1] }}
              </div>
            </div>

            <div v-else class="am-event-dates">
              <div>
                <div class="am-event-date-month" :style="getBookableColor(evt, false)">
                  {{ getEventFrontedFormattedDate(evt.periods[0].periodStart).split(' ')[0] }}
                </div>
                <div class="am-event-date-day">
                  {{ getEventFrontedFormattedDate(evt.periods[0].periodStart).split(' ')[1] }}
                </div>
              </div>

              <div>
                <div class="am-event-date-month" :style="getBookableColor(evt, false)">
                  {{ getEventFrontedFormattedDate(evt.periods[evt.periods.length - 1].periodEnd).split(' ')[0] }}
                </div>
                <div class="am-event-date-day">
                  {{ getEventFrontedFormattedDate(evt.periods[evt.periods.length - 1].periodEnd).split(' ')[1] }}
                </div>
              </div>
            </div>

            <!-- Event Info -->
            <div class="am-event-info">
              <div class="am-event-title">
                {{ evt.name }}
                <span class="am-event-booking-status" :class="getEventAvailability(evt).class" >
                  {{ getEventAvailability(evt).label }}
                </span>
              </div>
              <div class="am-event-sub-info">
                <div v-if="eventInfoLabels.event_capacity.visibility" class="am-event-sub-info-capacity">
                  <img :src="$root.getUrl + 'public/img/capacity.svg'"> {{ eventInfoLabels.event_capacity.value || $root.labels.event_capacity}} {{ evt.maxCapacity - evt.places }} / {{ evt.maxCapacity }}
                </div>
                <div v-if="getLocation(evt) && eventInfoLabels.location.visibility">
                  <img :src="$root.getUrl + 'public/img/pin.svg'"> {{ getLocation(evt) }}
                </div>
                <div v-if="eventInfoLabels.event_date.visibility">
                  <img :src="$root.getUrl + 'public/img/clock.svg'"> {{ getEventDatesAndTimes(evt.periods) }}
                </div>
                <div v-if="eventInfoLabels.time_zone.visibility">
                  {{ timeZoneString }}
                </div>
              </div>
            </div>

            <!-- Event Price -->
            <div v-if="evt.price !== 0 && eventInfoLabels.event_price.visibility" class="am-event-price" :style="getBookableColor(evt, true)">
              {{ getFormattedPrice(evt.price, !$root.settings.payments.hideCurrencySymbolFrontend)  }}
            </div>
            <div v-else-if="eventInfoLabels.event_price.visibility" class="am-event-price am-event-free" :style="getBookableColor(evt, false)">
              {{eventInfoLabels.event_free.value || $root.labels.event_free}}
            </div>
            <!-- /Event Price -->
          </div>
          <!-- /Event Data -->

          <!-- Event Details -->
          <transition name="fade">
            <div v-show="evt.showEventDetails">
              <!-- Event Details -->
              <div
                v-if="(evt.gallery && evt.gallery.length) || (evt.description && evt.description.length)"
                class="am-event-details"
              >
                <div
                  v-if="evt.gallery && evt.gallery.length"
                  class="am-event-photos"
                >
                  <div
                    v-for="(photo, index) in evt.gallery"
                    :key="photo.id"
                  >
                    <lightbox
                      :thumbnail="photo.pictureThumbPath"
                      :images="getImages(evt.gallery.map(image => image.pictureFullPath), index)"
                    >
                      <lightbox-default-loader slot="loader"></lightbox-default-loader>
                      <!-- If you want to use built-in loader -->
                      <!-- <div slot="loader"></div> --> <!-- If you want to use your own loader -->
                    </lightbox>
                  </div>
                 <!-- <img v-for="photo in evt.photos" :src="photo.url">-->
                </div>
                <div v-if="evt.description && evt.description.length" class="am-event-about">
                  <div>{{ eventInfoLabels.event_about.value || $root.labels.event_about }}</div>
                  <div v-html="evt.description"></div>
                </div>
              </div>

              <!-- Event Book -->
              <div
                v-if="getEventAvailability(evt).class === 'open'"
                class="am-event-book-cta"
                :class="getEventAvailability(evt).class"
              >
                <div v-if="eventInfoLabels.event_book.visibility" class="am-event-book-cta__inner">
                  <span>
                    {{eventInfoLabels.event_book.value || $root.labels.event_book}}
                  </span>
                </div>
                <div>
                  <el-form>
                    <el-form-item
                      v-if="evt.bringingAnyone"
                      :class="$root.settings.customization.forms ? `am-input-number-${$options.name}`: ''"
                    >
                      <template slot="label">
                        <span :style="{fontWeight: 700, color: forms.eventListForm.globalSettings.formTextColor}">
                          {{ eventInfoLabels.event_book_persons.value || $root.labels.event_book_persons }}
                        </span>
                      </template>
                      <el-input-number
                        :value="appointment.bookings[0].persons"
                        :min="1"
                        :max="evt.places"
                        type="number"
                        @change="setPlaces"
                      >
                      </el-input-number>
                    </el-form-item>

                    <el-form-item>
                      <el-button
                        type="primary"
                        :style="getBookableColor(evt, true)"
                        @click="toggleEventBooking(evt)"
                        :disabled="evt.places <= 0"
                      >
                        {{$root.labels.continue}}
                      </el-button>
                    </el-form-item>
                  </el-form>
                </div>
              </div>
            </div>
          </transition>
          <!-- /Event Details -->

          <!-- Confirm Booking -->
          <transition name="fade">
            <div
              v-show="evt.showEventBooking"
              class="am-event-booking"
            >
              <confirm-booking
                v-if="evt.showEventBooking"
                :visible.sync="evt.showEventBooking"
                dialogClass="am-confirm-booking-events-list"
                v-bind="cacheData && (cacheData.status === 'canceled' || cacheData.status === 'failed') ? getCacheDataRequestProps() : {
                  bookableType: 'event',
                  containerId: getContainerId(),
                  bookable: getBookableData(evt),
                  appointment: appointment,
                  customFields: options.entities.customFields,
                  phonePopulated: phonePopulated,
                  useGlobalCustomization: useGlobalCustomization(),
                  queryParams: getSearchParams()
                }"
                :form-type= "'eventListForm'"
                :forms-data="forms['eventListForm']"
                @confirmedBooking="confirmedBooking"
                @cancelBooking="evt.showEventBooking = false"
              >
              </confirm-booking>
            </div>
          </transition>
          <!-- /Confirm Booking -->

          <!-- Add To Calendar -->
          <transition name="fade">
            <div
              v-show="evt.showAddToCalendar"
              class="am-event-booking"
            >
              <add-to-calendar
                v-if="evt.showAddToCalendar"
                :form-type="'eventListForm'"
                :forms-data="forms['eventListForm']"
                :addToCalendarData="evt.addToCalendarData"
                @closeDialogAddToCalendar="evt.showAddToCalendar = false"
              >
              </add-to-calendar>
            </div>
          </transition>
          <!-- /Add To Calendar -->
        </div>
      </div>
      <!-- /Event List -->

      <div class="am-event-pagination">
        <el-pagination
          v-show="pagination.count > pagination.show && events.length > 0"
          :page-size="pagination.show"
          :total="pagination.count"
          layout="prev, pager, next"
          :current-page.sync=pagination.page
        >
        </el-pagination>
      </div>

      <div class="am-empty-state am-section" v-show="events.length === 0">
        <img :src="$root.getUrl + 'public/img/emptystate.svg'">
        <p>{{ $root.labels.no_results }}</p>
      </div>
    </div>

    <div class="am-lite-footer">
      <a class="am-lite-footer-link" v-if="$root.isLite && $root.settings.general.backLink.enabled" href="https://wpamelia.com/?utm_source=lite&utm_medium=websites&utm_campaign=powerdby" target="_blank">
        {{ $root.settings.general.backLink.label }}
      </a>
    </div>
  </div>
</template>

<script>
  import moment from 'moment'
  import formsCustomizationMixin from '../../../js/common/mixins/formsCustomizationMixin'
  import imageMixin from '../../../js/common/mixins/imageMixin'
  import settingsMixin from '../../../js/common/mixins/settingsMixin'
  import dateMixin from '../../../js/common/mixins/dateMixin'
  import priceMixin from '../../../js/common/mixins/priceMixin'
  import ConfirmBooking from '../parts/ConfirmBooking.vue'
  import bookingMixin from '../../../js/frontend/mixins/bookingMixin'
  import cacheMixin from '../../../js/frontend/mixins/cacheMixin'
  import commonEventMixin from '../../../js/common/mixins/eventMixin'
  import helperMixin from '../../../js/backend/mixins/helperMixin'
  import AddToCalendar from '../parts/AddToCalendar.vue'
  import customFieldMixin from '../../../js/common/mixins/customFieldMixin'
  import translationMixin from '../../../js/common/mixins/translationMixin'

  export default {
    name: 'eventListForm',

    mixins: [formsCustomizationMixin, cacheMixin, translationMixin, imageMixin, dateMixin, priceMixin, bookingMixin, commonEventMixin, helperMixin, customFieldMixin, settingsMixin],

    data () {
      return {
        tags: [],
        pagination: {
          show: this.$root.settings.general.itemsPerPage,
          page: 1,
          count: 0
        },
        params: {
          tag: null,
          date: 'ameliaBooking' in window && 'pastEventsDays' in window['ameliaBooking'] ? moment().subtract(window['ameliaBooking']['pastEventsDays'], 'days').toDate() : new Date(),
          page: 1
        },
        options: {
          entities: {
            tags: [],
            locations: []
          }
        },
        fetched: false,
        fetchedFiltered: false,
        events: [],
        appointment: {
          bookings: [{
            customer: {
              email: '',
              externalId: null,
              firstName: '',
              id: null,
              lastName: '',
              phone: ''
            },
            customFields: {},
            customerId: 0,
            extras: [],
            persons: 1
          }],
          payment: {
            amount: 0,
            gateway: '',
            data: {}
          }
        },
        forms: {},
        eventInfoLabels: {},
        eventFilterLabels: {},
        timeZoneString: this.$root.settings.general.showClientTimeZone ? Intl.DateTimeFormat().resolvedOptions().timeZone : this.$root.settings.wordpress.timezone
      }
    },

    created () {
      this.forms = this.getTranslatedForms('eventListForm')

      this.eventInfoLabels = this.$root.settings.customization.forms ? this.forms.eventListForm.eventDetailsForm.itemsStatic.eventDetailsFormField.labels : this.defaultFormsData.eventListForm.eventDetailsForm.itemsStatic.eventDetailsFormField.labels
      this.eventFilterLabels = this.$root.settings.customization.forms ? this.forms.eventListForm.eventFilterForm.itemsStatic.eventFilterFormField.labels : this.defaultFormsData.eventListForm.eventFilterForm.itemsStatic.eventFilterFormField.labels

      this.setCacheData(this.getContainerId(), true)

      if (this.cacheData && this.cacheData.request.queryParams) {
        this.pagination.page = this.cacheData.request.queryParams.page

        this.params.page = this.cacheData.request.queryParams.page
        this.params.date = new Date(this.cacheData.request.queryParams.dates[0])

        if (this.cacheData.request.queryParams.tag) {
          this.params.tag = this.cacheData.request.queryParams.tag
        }
      }
    },

    mounted () {
      this.getEntities(this.processListEntities)

      if (!this.$root.shortcodeData.hasEventShortcode) {
        this.inlineBookingSVG()
      }
      // expand event if its selected on shortcode and recurring is set to off
      let expandEvent = this.$root.shortcodeData.booking.eventId && this.$root.shortcodeData.booking.eventRecurring === 0

      this.getEvents(expandEvent)
    },

    methods: {
      runCacheAction () {
        if (this.loadingCacheBookingData) {
          if (this.cacheData.status === 'canceled' || this.cacheData.status === 'failed') {
            let event = this.events.find(event => event.id === this.cacheData.request.bookable.id)

            event.showEventBooking = true

            setTimeout(() => {
              this.cacheData = null
            }, 500)
          } else if (this.cacheData.status === 'paid' || this.cacheData.status === null) {
            this.confirmedBooking(this.cacheData.response, true)
          }

          this.loadingCacheBookingData = false
        }
      },

      getContainerId () {
        return 'amelia-app-booking' + this.$root.shortcodeData.counter
      },

      useGlobalCustomization () {
        return 'ameliaBooking' in window && 'useGlobalCustomization' in window.ameliaBooking && window.ameliaBooking.useGlobalCustomization === true
      },

      getImages (gallery, index) {
        for (let i = 0; i < index; i++) {
          gallery.push(gallery.shift())
        }

        return gallery
      },

      setPlaces (value) {
        this.appointment.bookings[0].persons = value
      },

      getBookableColor (bookable, colorBackground) {
        return colorBackground ? {
          'color': '#ffffff',
          'background-color': bookable.color,
          'border-color': '#ffffff'
        } : {
          'color': bookable.color,
          'background-color': '',
          'border-color': ''
        }
      },

      getEventDatesAndTimes (periods) {
        let $this = this

        let resultPeriods = []

        this.getImplodedPeriods(periods).forEach(function (period) {
          let periodStart = period.periodStart.split(' ')
          let periodEnd = period.periodEnd.split(' ')

          if (period.isConnected) {
            resultPeriods.push($this.getFrontedFormattedDateTime(periodStart) + ' - ' + $this.getFrontedFormattedDateTime(periodEnd))
          } else {
            if (periodStart[0] === periodEnd[0]) {
              resultPeriods.push($this.getFrontedFormattedDate(periodStart[0]) + ' ' + $this.getFrontedFormattedTime(periodStart[1]) + ' - ' + $this.getFrontedFormattedTime(periodEnd[1]))
            } else {
              resultPeriods.push($this.getFrontedFormattedDate(periodStart[0]) + ' - ' + $this.getFrontedFormattedDate(periodEnd[0]) + ' ' + $this.getFrontedFormattedTime(periodStart[1]) + ' - ' + $this.getFrontedFormattedTime(periodEnd[1]))
            }
          }
        })

        return resultPeriods.join(', ')
      },

      showTags () {
        return this.options.entities.tags.length > 1 && this.showDatePicker()
      },

      showDatePicker () {
        return this.getPreselectedEventId() === null || (this.getPreselectedEventId() !== null && this.getPreselectedEventRecurring())
      },

      getColumnLength () {
        if (this.showTags() && this.showDatePicker()) {
          return [12, 12]
        }

        if (this.showTags() && !this.showDatePicker()) {
          return [24, 0]
        }

        if (!this.showTags() && this.showDatePicker()) {
          return [0, 24]
        }

        if (!this.showTags() && !this.showDatePicker()) {
          return [12, 12]
        }

        return [12, 12]
      },

      getEntities () {
        this.options.entities.locations = []

        this.options.entities.tags = []

        this.options.entities.customFields = []

        this.setBookingCustomFields()
      },

      getEventAvailability (evt) {
        if (evt.status === 'approved' || evt.status === 'pending') {
          if (evt.full) {
            return {
              label: this.eventInfoLabels.full.value || this.$root.labels.full,
              class: 'full'
            }
          }
          if (evt.upcoming) {
            return {
              label: this.eventInfoLabels.upcoming.value || this.$root.labels.upcoming,
              class: 'upcoming'
            }
          }
          return !evt.bookable ? {
            label: this.eventInfoLabels.closed.value || this.$root.labels.closed,
            class: 'closed'
          } : {
            label: this.eventInfoLabels.open.value || this.$root.labels.open,
            class: 'open'
          }
        } else {
          return {
            label: this.eventInfoLabels.canceled.value || this.$root.labels.canceled,
            class: 'canceled'
          }
        }
      },

      isEventInSameDay (evt) {
        let result = true

        if (evt.periods.length === 1) {
          result = evt.periods[0].periodStart.split(' ')[0] === evt.periods[0].periodEnd.split(' ')[0]
        } else {
          let periodStart = evt.periods[0].periodStart.split(' ')[0]
          let periodEnd = evt.periods[0].periodEnd.split(' ')[0]

          evt.periods.forEach(function (period) {
            if (period.periodStart.split(' ')[0] !== periodStart || period.periodEnd.split(' ')[0] !== periodEnd) {
              result = false
            }
          })
        }

        return result
      },

      confirmedBooking (responseData, skipNotify) {
        let event = this.events.find(event => event.id === responseData.event.id)

        event.places = event.places - this.appointment.bookings[0].persons
        if (event.places <= 0) event.full = true

        event.addToCalendarData = this.getEventAddToCalendarData(
          responseData,
          skipNotify
        )

        // Customization hook
        if ('beforeConfirmedBooking' in window) {
          window.beforeConfirmedBooking(event.addToCalendarData)
        } else {
          event.showEventBooking = false
          event.showAddToCalendar = true
          event.bookingCompleted = true
        }
      },

      getSearchParams () {
        let params = JSON.parse(JSON.stringify(this.params))

        let eventId = this.getPreselectedEventId()

        let recurring = this.getPreselectedEventRecurring()

        let tagName = this.getPreselectedTag() ? this.getPreselectedTag() : params.tag

        if (!tagName) {
          tagName = null
        }

        return {
          dates: params.date ? [
            this.getDateString(params.date)
          ] : [
            this.getDateString(this.getNowDate())
          ],
          tag: tagName,
          page: this.pagination.page,
          id: eventId,
          recurring: recurring
        }
      },

      getBookableData (evt) {
        return {
          id: evt.id,
          name: evt.name,
          price: evt.price,
          depositData: evt.depositPayment !== 'disabled' ? {
            deposit: evt.deposit,
            depositPayment: evt.depositPayment,
            depositPerPerson: evt.depositPerPerson
          } : null,
          maxCapacity: evt.maxCapacity,
          color: evt.color,
          aggregatedPrice: true,
          bookingStart: evt.periods[0].periodStart,
          bookingStartTime: evt.periods[0].periodStart.split(' ')[1]
        }
      },

      getEvents (expandEvent) {
        this.$http.get(`${this.$root.getAjaxUrl}/events`, {
          params: this.getSearchParams()
        })
          .then(response => {
            let $this = this

            this.events = []

            this.pagination.count = response.data.data.count

            response.data.data.events.forEach(function (event) {
              event.gallery = event.gallery.sort((a, b) => (a.position > b.position) ? 1 : -1)

              event.showEventDetails = expandEvent || response.data.data.events.length === 1
              event.showEventBooking = false
              event.showAddToCalendar = false
              event.bookingCompleted = false

              if ($this.$root.useTranslations) {
                event.name = $this.getNameTranslated(event)
                event.description = $this.getDescriptionTranslated(event)
              }

              $this.events.push(event)

              if ($this.$root.settings.general.showClientTimeZone) {
                event.periods.forEach(function (period) {
                  let utcOffsetStart = moment(period.periodStart, 'YYYY-MM-DD HH:mm:ss').toDate().getTimezoneOffset()
                  let utcOffsetEnd = moment(period.periodEnd, 'YYYY-MM-DD HH:mm:ss').toDate().getTimezoneOffset()

                  if (utcOffsetStart > 0) {
                    period.periodStart = moment.utc(period.periodStart, 'YYYY-MM-DD HH:mm:ss').subtract(utcOffsetStart, 'minutes').format('YYYY-MM-DD HH:mm:ss')
                  } else {
                    period.periodStart = moment.utc(period.periodStart, 'YYYY-MM-DD HH:mm:ss').add(-1 * utcOffsetStart, 'minutes').format('YYYY-MM-DD HH:mm:ss')
                  }

                  if (utcOffsetEnd > 0) {
                    period.periodEnd = moment.utc(period.periodEnd, 'YYYY-MM-DD HH:mm:ss').subtract(utcOffsetEnd, 'minutes').format('YYYY-MM-DD HH:mm:ss')
                  } else {
                    period.periodEnd = moment.utc(period.periodEnd, 'YYYY-MM-DD HH:mm:ss').add(-1 * utcOffsetEnd, 'minutes').format('YYYY-MM-DD HH:mm:ss')
                  }
                })
              }
            })

            this.runCacheAction()

            if ('ameliaEventsLoaded' in window) {
              window.ameliaEventsLoaded($this.events)
            }

            this.fetched = true
            this.fetchedFiltered = true
          })
          .catch(e => {
            console.log(e.message)
          })
      },

      toggleEventDetails (evt) {
        this.scrollView('am-event-' + evt.id, 'start')
        evt.showEventDetails = !evt.showEventDetails
        this.events.forEach(function (event) {
          if (event.id !== evt.id) {
            event.showEventDetails = false
            event.showEventBooking = false
            event.showAddToCalendar = false
            event.showConfirmBooking = false
          }
        })
        evt.showEventBooking = false

        if (event.bookingCompleted) {
          event.showAddToCalendar = evt.showEventDetails
        }

        this.appointment.bookings[0].persons = 1

        this.updateSettings(evt.settings)

        if ('ameliaEventSelected' in window) {
          window.ameliaEventSelected(evt)
        }
      },

      toggleEventBooking (evt) {
        evt.showEventDetails = !evt.showEventDetails
        evt.showEventBooking = !evt.showEventBooking
      },

      getLocation (evt) {
        if (evt.locationId && this.options.entities.locations.length) {
          let location = this.options.entities.locations.find(location => location.id === evt.locationId)

          return typeof location !== 'undefined' ? location.name : ''
        } else if (evt.customLocation) {
          return evt.customLocation
        }
      },

      inlineBookingSVG () {
        let inlineSVG = require('inline-svg')
        inlineSVG.init({
          svgSelector: 'img.svg-booking',
          initClass: 'js-inlinesvg'
        })
      }
    },

    computed: {},

    watch: {
      'pagination.page' () {
        if (this.cacheData && this.cacheData.request.queryParams) {
          this.cacheData.request.queryParams = null
        } else {
          this.getEvents(false)
        }
      }
    },

    components: {
      ConfirmBooking,
      AddToCalendar
    }
  }
</script>

