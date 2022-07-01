import { gsap } from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'

import '@core/images'

import '../scss/app.scss'

import getClasses from './classes/getClasses'

// import $ from 'jquery'

// import './lazy/lazy'

gsap.registerPlugin(ScrollTrigger)

console.log('Webpack working!')

getClasses()

const elvenShieldRecipe = {
  leatherStrips: 10,
  ironIngot: 1,
  refinedMoonstone: 4,
}

// ES7 Object spread example
const elvenGauntletsRecipe = {
  ...elvenShieldRecipe,
  leather: 1,
  refinedMoonstone: 1,
}
console.log('ES7 Object spread example: 2', elvenGauntletsRecipe)

// ES8 Object.values example
// Note: Will not transpile without babel/imported polyfills because it is a new method
console.log('ES8 Object.values example', Object.values(elvenGauntletsRecipe))
