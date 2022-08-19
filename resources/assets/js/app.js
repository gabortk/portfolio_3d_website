import UIkit from 'uikit';
import Icons from 'uikit/dist/js/uikit-icons';

// loads the Icon plugin
UIkit.use(Icons);

// components can be called from the imported UIkit reference
UIkit.notification("<span class='primary-blue' uk-icon='icon: check'></span> <a class='primary-blue' href='/kapcsolat'>Kérjen ajánlatot!</a>", { status:'success',  pos: 'bottom-right' });