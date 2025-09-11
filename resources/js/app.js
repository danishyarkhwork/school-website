import "./bootstrap";

import Alpine from "alpinejs";
import { animate, scroll, stagger, inView } from "motion";

window.Alpine = Alpine;
window.animate = animate;
window.scroll = scroll;
window.stagger = stagger;
window.inView = inView;

Alpine.start();
