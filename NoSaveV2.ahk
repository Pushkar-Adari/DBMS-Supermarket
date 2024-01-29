#NoEnv
#SingleInstance force
#Persistent
SetWorkingDir %A_ScriptDir%
SetKeyDelay 0
SetWinDelay 0
SetBatchLines -1
SetControlDelay -1
SetTitleMatchMode, 2
if not A_IsAdmin
    Run *RunAs "%A_ScriptFullPath%"
OnExit("AppExit")
!+f4::ExitApp

^Numpad0::
    RunWait, % ComSpec " /c netsh advfirewall firewall add rule name=BATCH GTA 5 BLOCK dir=out action=block ,hide"
    RunWait, % ComSpec " /c netsh advfirewall firewall add rule name=BATCH GTA 5 BLOCK dir=in action=block ,hide"
    ToolTip, GTA5 NETWORK BLOCK ON
    Sleep 3000
    Tooltip
return

^Numpad1::
    RunWait, % ComSpec " /c netsh advfirewall firewall delete rule name=BATCH GTA 5 BLOCK ,hide"
    ToolTip, GTA5 NETWORK BLOCK OFF
    Sleep 3000
    Tooltip
return

^f9::
    RunWait, % ComSpec " /c netsh advfirewall firewall add rule name=123456 dir=out action=block remoteip=192.81.241.171 ,hide"
    ToolTip, NO SAVING MODE ON
    Sleep 3000
    Tooltip
return

^f12::
    RunWait, % ComSpec " /c netsh advfirewall firewall delete rule name=123456 ,hide"
    ToolTip, NO SAVING MODE OFF
    Sleep 3000
    Tooltip
return

^f8::
    Tooltip, (Ctrl and Num0 - block connection for the game`nCtrl and Num1 - restore connection for the game`nCtrl and F9 - Disable saving mode`nCtrl and F12 - Enable/Restore saving mode`nCtrl and F8 - Display this help text)
    Sleep 5000
    Tooltip
return

; AppExit function
AppExit() {
    RunWait, % ComSpec " /c netsh advfirewall firewall delete rule name=BATCH GTA 5 BLOCK ,hide"
    RunWait, % ComSpec " /c netsh advfirewall firewall delete rule name=123456 ,hide"
}
