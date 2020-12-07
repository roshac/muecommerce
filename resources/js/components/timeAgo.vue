<template>
<timeago :datetime="new Date()" :auto-update="5"></timeago>
<!-- <time-ago :refresh="60" :datetime="new Date(2018, 7, 4, 0, 24, 0)" locale="zh_TW" tooltip></time-ago> -->
</template>

<script>
import VueTimeago from 'vue-timeago'

Vue.use(VueTimeago, {
  name: 'Timeago', // Component name, `Timeago` by default
  locale: 'en', // Default locale
  // We use `date-fns` under the hood
  // So you can use all locales from it
  locales: {
    'zh-CN': require('date-fns/locale/zh_cn'),
    ja: require('date-fns/locale/ja')
  }
})
export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
