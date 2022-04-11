const base_url = window.location.origin;

const url = window.location.href.split("/")
const firstURLSegment = url[3];


const pageURL = window.location.href;
const lastURLSegment = pageURL.substr(pageURL.lastIndexOf('/') + 1);
