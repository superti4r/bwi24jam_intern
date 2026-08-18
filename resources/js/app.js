import { initialiseAppMenu } from "./motion/app-menu";
import { initialiseMotionInteractions } from "./motion/interactions";
import { initialiseSearchForms } from "./search";
import { initialiseShareTools } from "./share";
import { initialiseConfirmDialogs } from "./dialogs";
import { initialiseQuillEditors } from "./editor/quill";
import { initialiseSectionFields } from "./editor/section-fields";

initialiseMotionInteractions();
initialiseSearchForms();
initialiseShareTools();
initialiseAppMenu();
initialiseQuillEditors();
initialiseSectionFields();
initialiseConfirmDialogs();
