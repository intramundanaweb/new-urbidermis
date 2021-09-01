<template>
  <el-form label-position="top">
    <div
      v-show="editable ? editable : componentDisplay()"
      class="am-customize-field"
      :class="{'editable': editable}"
      :style="{borderColor: oppositeBackgroundColor}"
    >
      <el-row :gutter="24">
        <el-col :sm="12">
          <el-form-item>
            <el-select
              v-model="param"
              :popper-class="'am-dropdown'"
              :placeholder="(languageShortCode ? labelParamType.translations[languageShortCode] : labelParamType.value) || $root.labels.event_type"
              :style="{ backgroundColor: customizationForm.formInputColor, color: customizationForm.formInputTextColor, borderColor: selectInputFocus ? customization.primaryColor : '#C0C4CC' }"
              @focus="inputFocus"
            >
              <el-option
                v-for="item in paramOptions"
                :key="item.name"
                :label="item.name"
                :value="item.name"
                :style="{
                  backgroundColor: customizationForm.formDropdownColor,
                  color: item.name === param ? customization.primaryColor : customizationForm.formDropdownTextColor,
                  fontFamily: customization.font
                }"
              >
              </el-option>
            </el-select>
          </el-form-item>
        </el-col>

        <el-col :sm="12" class="v-calendar-column">
          <el-form-item>
            <v-date-picker
              v-model="selectedDate"
              mode='single'
              popover-align="center"
              popover-direction="bottom"
              popover-visibility="focus"
              input-class='el-input__inner'
              :is-required=true
              :is-expanded=false
              :is-double-paned=false
              :show-day-popover=false
              :input-props='{class: "el-input__inner"}'
              :tint-color='customization.primaryColor'
              :formats="vCalendarFormats"
              :style="{ backgroundColor: customizationForm.formInputColor, color: customizationForm.formInputTextColor, borderColor: selectInputFocus ? customization.primaryColor : '#C0C4CC' }"
            >
            </v-date-picker>
          </el-form-item>
        </el-col>
      </el-row>

      <!-- Edit Dialog -->
      <customize-edit-dialog
        :form-field="formField"
        :language-short-code="languageShortCode"
        @saveEdit="saveFormFiledEdit"
      >
        <template v-slot:fieldEdit>
          <span v-show="editable" class="am-customize-field__edit">
            <img :src="$root.getUrl + 'public/img/am-customize-icon-edit.svg'" />
          </span>
        </template>
      </customize-edit-dialog>
      <!-- /Edit Dialog -->
    </div>
  </el-form>
</template>

<script>
import dateMixin from '../../../../js/common/mixins/dateMixin'
import customizeEditDialog from '../dialogs/CustomizeEditDialog'

export default {
  name: 'eventFilterFormField',

  components: {
    customizeEditDialog
  },

  props: {
    languageShortCode: {
      type: String,
      default: ''
    },
    customization: {
      type: Object
    },
    editable: {
      type: Boolean,
      default: true
    },
    oppositeBackgroundColor: {
      type: String,
      default: '#000'
    },
    customizationForm: {
      type: Object,
      default: () => {
        return {}
      }
    },
    formField: {
      type: Object,
      default: () => {
        return {}
      }
    }
  },

  mixins: [dateMixin],

  data () {
    return {
      selectInputFocus: false,
      selectedDate: this.$moment().toDate(),
      labelParamType: this.formField.labels.event_type,
      param: '',
      paramOptions: [
        {name: 'Param 1'},
        {name: 'Param 2'},
        {name: 'Param 3'}
      ]
    }
  },

  methods: {
    inputFocus () {
      this.selectInputFocus = true
    },

    componentDisplay () {
      if (this.formField.hasOwnProperty('visibility')) {
        return this.formField.visibility
      }

      return true
    },

    saveFormFiledEdit (objData) {
      let fieldData = {}
      fieldData['itemsStatic'] = {}
      fieldData['itemsStatic'][this.$options.name] = JSON.parse(JSON.stringify(objData))
      this.$emit('saveEdit', fieldData)
    }
  },

  watch: {
    'formField' () {
      this.labelParamType = this.formField.labels.event_type
    }
  }
}
</script>
