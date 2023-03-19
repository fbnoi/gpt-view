const Ziggy = {"url":"http:\/\/192.168.0.107","port":null,"defaults":{},"routes":{"sanctum.csrf-cookie":{"uri":"sanctum\/csrf-cookie","methods":["GET","HEAD"]},"ignition.healthCheck":{"uri":"_ignition\/health-check","methods":["GET","HEAD"]},"ignition.executeSolution":{"uri":"_ignition\/execute-solution","methods":["POST"]},"ignition.updateConfig":{"uri":"_ignition\/update-config","methods":["POST"]},"api.session.history":{"uri":"api\/session\/history\/{id}","methods":["GET","HEAD"]},"api.session.send":{"uri":"api\/session\/send\/{id}","methods":["POST"]},"index":{"uri":"\/","methods":["GET","HEAD"]},"session.ui":{"uri":"session\/{id}","methods":["GET","HEAD"]}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
