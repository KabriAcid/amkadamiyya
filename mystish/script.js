function detectDevice() {
  const userAgent = navigator.userAgent.toLowerCase();
  const isMobile =
    /mobile|android|touch|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/.test(
      userAgent
    );

  if (isMobile) {
    // Tailor interface for mobile
    document.body.classList.add("mobile");
    console.log("Mobile device detected");
  } else {
    // Tailor interface for desktop
    document.body.classList.add("desktop");
    console.log("Desktop device detected");
  }
}

// Call the function on page load
window.onload = detectDevice;