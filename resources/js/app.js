import "./bootstrap"
import "flowbite"
import $ from "jquery"

import { init as cHistory } from "./charts/history";
import { init as cDevice } from "./charts/device";
import { init as fDashboard } from "./pages/dashboard";

window.$ = $
window.jQuery = $

const hsChartEl = document.getElementById("history-chart")
const dvChart = document.getElementById("temp-device-chart")
const controlEl = document.querySelector(".manual-control");

if(dvChart) cDevice();
if(hsChartEl) cHistory(hsChartEl);
if(controlEl) fDashboard();
