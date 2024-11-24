import "./bootstrap"
import "flowbite"
import $ from "jquery"

import { init as cHistory } from "./charts/history";
import { init as cDevice } from "./charts/device";

window.$ = $
window.jQuery = $

const hsChartEl = document.getElementById("history-chart")
const dvChart = document.getElementById("temp-device-chart")

if(dvChart) cDevice();
if(hsChartEl) cHistory(hsChartEl);
